        <footer class="text-center text-slate-500 py-10 mt-10">
            <p>© <?php echo date('Y'); ?> Galerie — Tous droits réservés.</p>
        </footer>
        <div class="pointer-events-none fixed bottom-0 left-0 w-full -z-10">
            <svg viewBox="0 0 1440 320" class="w-full h-auto">
                <path fill="#3B82F6" fill-opacity="0.25"
                    d="M0,256L48,240C96,224,192,192,288,181.3C384,171,480,181,576,170.7C672,160,768,128,864,133.3C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
        <script type="text/javascript">
            document.getElementById("publier").onclick = function () {
                location.href = "/publier";
            };
            document.getElementById("publier2").onclick = function () {
                location.href = "/publier";
            };
            document.getElementById("admin").onclick = function () {
                location.href = "/admin";
            };
            document.getElementById("admin2").onclick = function () {
                location.href = "/admin";
            };
        </script>
    </body>
</html>