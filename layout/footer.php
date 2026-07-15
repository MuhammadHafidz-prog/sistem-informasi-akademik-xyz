<footer class="text-center text-muted py-3 border-top bg-light">

    <small>
        Sistem Informasi Akademik XYZ |
        Universitas Indraprasta PGRI <br>
        © 2026 - Muhammad Hafidz Alghifari
    </small>

</footer>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script>

$(document).ready(function(){

    setTimeout(function(){

        $(".alert").fadeTo(500,0).slideUp(500,function(){

            $(this).remove();

        });

    },3000);

});

</script>

</body>
</html>