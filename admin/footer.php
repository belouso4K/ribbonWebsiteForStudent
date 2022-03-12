
<footer>
    <div class="footer-section">
        <div class="container">
            <div class="footer-elem">
                <img src="../assets/img/logo_footer.svg" alt="">
                <div>
                    <span>© 2022 Lenta.com</span>
                    <a href="/privacy-policy.php">Политика конфиденциальности</a>
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
<script>
    window.onload = () => {
        document.querySelector('.loader').style.display = 'none'
    }
    function number(inp) {
        inp.value = inp.value.replace(/\D/g,'')
    }
    function deleteEl(el) {
        if (confirm("Вы уверены, что хотите удалить товар?\nЭта операция не восстановима.")) {
            el.closest('form').submit()
        }
    }
    function deleteOrder(el) {
        if (confirm("Вы уверены, что хотите удалить заказ?\nЭта операция не восстановима.")) {
            el.closest('form').submit()
        }
    }
</script>
</body>
</html>