<!-- ========================================== -->
  
</div>
<!-- KODE PALING BAWAH: FOOTER                  -->
  <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        const fallingTypes = ["🌸", "❀", "✿", "♡", "✦", "✧"];

        function createFallingItem() {
            const item = document.createElement("span");
            item.className = "falling-item";
            item.textContent = fallingTypes[
                Math.floor(Math.random() * fallingTypes.length)
            ];

            item.style.left = (Math.random() * 95) + "vw";
            item.style.fontSize = (10 + Math.random() * 10) + "px";

            const duration = 6 + Math.random() * 6;
            item.style.animationDuration = duration + "s";

            document.body.appendChild(item);

            setTimeout(() => {
                item.remove();
            }, (duration + 1) * 1000);
        }

        setInterval(createFallingItem, 750);

        for (let i = 0; i < 6; i++) {
            setTimeout(createFallingItem, i * 350);
        }
    </script>
  
  
    <!-- ========================================== -->
    <footer class="main-footer">
        <p class="footer-text">
            Made with ♡ by Reyya &copy; <?= date('Y'); ?>
        </p>
    </footer>

    </body>
</html>