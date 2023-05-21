<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: ghostwhite;
        }

        .btn {
            background: coral;
            color: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 0.7rem 2rem;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .page-info {
            margin-left: 1rem;
        }

        .error {
            background: orangered;
            color: #fff;
            padding: 1rem;
        }

        .container {
            display: flex;
            justify-content: center;
        }

        #pdf-render {
            max-width: 100%;
            max-height: 100%;
        }

        .page-info {
            color: white;
        }
    </style>
    <title>Preview</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" style="color:white">Preview</a>

        <div id="navbarNav">

            <button class="btn btn-light mr-2" id="prev-page"><i class="fas fa-arrow-circle-left"></i>Para</button>


            <button class="btn btn-light  mr-2" id="next-page">Pas<i class="fas fa-arrow-circle-right"></i></button>

            <span class="page-info">
                Faqja <span id="page-num"></span> nga <span id="page-count"></span>
            </span>
        </div>
    </nav>

    <?php
    require '/Applications/XAMPP/xamppfiles/htdocs/Albjuris/php/db.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($con, "Select * from books where id='$id'");
        $row = mysqli_fetch_array($query);

    }
    ?>

    <div class="container">
        <input type="hidden" id="pdf" value="file/<?php echo $row['pdf'] ?>">
        <canvas id="pdf-render"></canvas>
    </div>

    </div>

    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>


    <script>
        // URL of the PDF file

        url = document.getElementById('pdf').value;

        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumIsPending = null;

        const scale = 1.5,
            canvas = document.querySelector('#pdf-render'),
            ctx = canvas.getContext('2d');

        // Render the page
        renderPage = num => {
            pageIsRendering = true;

            // Get page
            pdfDoc.getPage(num).then(page => {
                // Set scale
                const viewport = page.getViewport({ scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport
                };

                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;

                    if (pageNumIsPending !== null) {
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                });

                // Output current page
                document.querySelector('#page-num').textContent = num;
            });
        };

        // Check for pages rendering
        queueRenderPage = num => {
            if (pageIsRendering) {
                pageNumIsPending = num;
            } else {
                renderPage(num);
            }
        };

        // Show Prev Page
        showPrevPage = () => {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        };

        // Show Next Page
        showNextPage = () => {
            if (pageNum >= 3) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        };

        // Get Document
        pdfjsLib
            .getDocument(url)
            .promise.then(pdfDoc_ => {
                pdfDoc = pdfDoc_;

                document.querySelector('#page-count').textContent = 3;

                renderPage(pageNum);
            })
            .catch(err => {
                // Display error
                const div = document.createElement('div');
                div.className = 'error';
                div.appendChild(document.createTextNode(err.message));
                document.querySelector('body').insertBefore(div, canvas);
                // Remove top bar
                document.querySelector('.top-bar').style.display = 'none';
            });

        // Button Events
        document.querySelector('#prev-page').addEventListener('click', showPrevPage);
        document.querySelector('#next-page').addEventListener('click', showNextPage);
    </script>
</body>

</html>