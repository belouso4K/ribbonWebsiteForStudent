<footer>
    <?php if(isset($_SESSION['admin'])): ?>
        <a href="/admin" class="button-admin">
            <i class="fas fa-users-cog"></i>
        </a>
    <?php endif;?>
    <div class="footer-section">
        <div class="cart-footer">
            <a href="cart.php" class="cart">
                <i class="fas fa-shopping-cart"></i>
                <span class="current-cart"></span>
            </a>
        </div>

        <div class="container">
            <div class="footer-elem">
                <img src="assets/img/logo_footer.svg" alt="">
                <div>
                    <span>© 2022 Lenta.com</span>
                    <a href="privacy-policy.php">Политика конфиденциальности</a>
                </div>
            </div>
            <div class="footer-info">
                <div>
                    <span>Центр информационной поддержки клиента</span>
                    <div class="phone"><i class="fas fa-phone-alt"></i>8 800 700 4 111</div>
                </div>
                <div class="social-icon">
                    <a href=""><i class="fab fa-vk"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-whatsapp"></i></a>
                    <a href=""><i class="fab fa-telegram-plane"></i></a>
                </div>
            </div>

        </div>
    </div>
</footer>
<script
        src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="
        crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="assets/script.js">

</script>

</body>
</html>