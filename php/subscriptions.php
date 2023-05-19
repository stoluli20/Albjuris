<!DOCTYPE html>
<html lang="en">

<head>
    <title>Subscriptions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    
    <style>
        .section-subscriptions {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .subscription-card {
            background-color: #fff;
            border-radius: 4px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-price {
            font-size: 20px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #000000 !important;
            border-color: #fff !important;
        }

        .btn-primary:hover {
            background-color: #fff !important;
            border-color: #000000 !important;
            color:#000000 !important;
        }

        .btn-primary:focus,
        .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
        }

        .card-price {

            color: #000000 !important;
        }
    </style>
</head>

<body>
    <?php require '../html/header.php'; ?>
    <section class="section-subscriptions">
        <div class="container">
            <h2 style="text-align:center; margin-bottom:40px;">Subscriptions</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="subscription-card">
                        <h5 class="card-title">Basic</h5>
                        <p class="card-price">$9.99/month</p>
                        <p class="card-text">1-week access to all books</p>
                        <a href="#" class="btn btn-primary">Choose Plan</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="subscription-card">
                        <h5 class="card-title">Standard</h5>
                        <p class="card-price">$19.99/month</p>
                        <p class="card-text">1-month access to all books and 15% discount on physical books.</p>
                        <a href="#" class="btn btn-primary">Choose Plan</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="subscription-card">
                        <h5 class="card-title">Premium</h5>
                        <p class="card-price">$49.99/month</p>
                        <p class="card-text">6-month access to all books and 20% discount on physical books.</p>
                        <a href="#" class="btn btn-primary">Choose Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php require '../html/footer.html'; ?>
    </body>

</html>