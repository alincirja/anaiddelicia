        <footer class="site-footer">
            <div class="container">
                <div class="copy text-center">
                    <span>
                        Anaid Delicia &copy; <?php echo date("Y"); ?>
                        Toate drepturile rezervate.
                        <a href="#">Termeni de Utilizare</a>
                        |
                        <a href="#">Politica de Confidentialitate</a>
                    </span>
                    <div class="disclaimer">
                        <small>
                            <strong>Disclaimer:</strong>
                            Nu suntem responsabili pentru eventualele pofte create.
                        </small>
                    </div>
                </div>
            </div>
        </footer>

        <!-- MODALS -->
        <?php
        include_once("modals/login.php");
        include_once("modals/register.php");
        ?>

        <div class='check-view'><span data-breakpoint='xs' class='d-block d-sm-none'></span><span data-breakpoint='sm' class='d-none d-sm-block d-md-none'></span><span data-breakpoint='md' class='d-none d-md-block d-lg-none'></span><span data-breakpoint='lg' class='d-none d-lg-block d-xl-none'></span><span data-breakpoint='xl' class='d-none d-xl-block'></span></div>
        
        <script src="js/app.bundle.js" async defer></script>
    </body>
</html>