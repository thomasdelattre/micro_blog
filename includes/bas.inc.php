
</div>
</section>


<!-- Footer -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Location</h3>
                    <p>3481 Melrose Place
                        <br>Beverly Hills, CA 90210</p>
                    </div>
                    <div class="footer-col col-md-4">

                    </div>
                    <div class="footer-col col-md-4">
                        <h3>A propos</h3>
                        <p>Micro blog est une application PHP basée sur le thème <a href="https://startbootstrap.com/template-overviews/freelancer/">Freelancer</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

    <script>
    //script JQUERY servant a afficher les messages d'erreur lors de la connexion si l'utilsateur n'a pas rentré d'adresse email ou de mot de passe
        $(document).ready(function() {
            $('#formConnexion').submit(function(){
                var email =$('#email').val();
                var mdp =$('#mdp').val();

                if(email==""){
                    $('#msgErreur').removeClass("hidden").addClass("visible alert alert-danger").html("Veuillez entrer un email");
                    $('#email').addClass("alert alert-danger");
                    return false;
                }
                else if(mdp==""){
                    $('#msgErreur').removeClass("hidden").addClass("visible alert alert-danger").html("Veuillez entrer un mot de passe");
                    $('#mdp').addClass("alert alert-danger");
                    return false;
                }
                else{
                    return true;
                }
                
            })
        });
    </script>
</body>

</html>
