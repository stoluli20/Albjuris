
<style>
    nav {
  background-color: #333;
  display: flex;
  justify-content: center;
}

.nav-button {
  color: #fff;
  text-decoration: none;
  padding: 10px 20px;
  margin: 0 10px;
}

.active {
  background-color: #ff0000;
}

</style>

<nav>
  <a href="#" class="nav-button">Button 1</a>
  <a href="#" class="nav-button">Button 2</a>
</nav>

<script>
    const navButtons = document.querySelectorAll('.nav-button');

navButtons.forEach(button => {
  button.addEventListener('click', () => {
    navButtons.forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');
  });
});


</script>