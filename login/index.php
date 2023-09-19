<!DOCTYPE html>
<html lang="pt-br" >
<head>
   <title>Authentication - GLPI</title>

   <meta charset="utf-8" />

      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <meta name="robots" content="noindex, nofollow" />

   <meta property="glpi:csrf_token" content="9052ba889cd809b2a335db33104733845f50d77f168ab094fa12f0c9a843b118" />

         <link rel="stylesheet" type="text/css" href="/public/lib/base.min.css?v=37c889333497a20c719eac4def820cc9b08afcf8" />
         <link rel="stylesheet" type="text/css" href="/css_compiled/css_palettes_aerialgreen.min.css?v=37c889333497a20c719eac4def820cc9b08afcf8" />
   
   <style>* {
    /*Background parte externa*/
    --login-bg-glpi: url(/pics/BannerAmMG.png);

    /*Logo parte interna*/
    --bar-logo-glpi: url(/pics/Logo-escudos-site-branco-1.png);
  
    /*Logo parte interna c/ menu recolhido*/
    --bar-logo-glpi-collapsed: url(/pics/Logo-escudos-site-branco-1.png);

    /*cor primaria*/
    --main-primary-color: #3CB371;
    --main-primary-color-hover: #006400;
    --main-primary-color-text: #fff;

    /*cor secundaria*/
    --main-secondary-color: #009EDF;
    --main-secondary-color-hover: #742A82;
    --main-secondary-color-text: #fff;

    /*cor para destaque*/
    --main-detach-color: #fff;
    --main-counter-color: #742A82;
}

.welcome-anonymous{
	background: var(--login-bg-glpi) no-repeat;
    background-size: cover;
    background-position-x: center;
    background-attachment: fixed;
}

.welcome-anonymous .col-auto {
    flex: 0 0 auto;
    width: auto;
    /*background: var(--login-logo-glpi) no-repeat;*/
    background-position-x: center;
    background-position-y: center;
}
.page-anonymous .glpi-logo{
	display: none;
}
.page .glpi-logo {
    /*logo menu lateral ou superior*/
    background: var(--bar-logo-glpi) no-repeat;
    background-position: center;
    background-size: contain;
    height: 80px;
    width: 200px;
}

body.navbar-collapsed .navbar-brand .glpi-logo {
    /*logo menu recolhido*/
    background: var(--bar-logo-glpi-collapsed) no-repeat;
    background-size: contain;
    background-position: center;
    width: 65px;
    height: 55px;
}

.sidebar,
.topbar {
    /*cor menu lateral ou superior*/
    background-color: var(--main-primary-color);
    color: #fff;
    z-index: 1030;
}

.btn-primary,
.btn-outline-primary,
.btn-ghost-primary {
    /*botões primarios*/
    --tblr-btn-color: var(--main-primary-color);
    --tblr-btn-color-interactive: var(--main-primary-color-hover);
    --tblr-btn-color-text: var(--main-primary-color-text);
    border: none;
}

.btn-secondary,
.btn-outline-secondary,
.btn-ghost-secondary {
    /*botões secundarios*/
    --tblr-btn-color: var(--main-secondary-color);
    --tblr-btn-color-interactive: var(--main-secondary-color-hover);
    --tblr-btn-color-text: var(--main-secondary-color-text);
}

.btn-secondary{
	border: none;
}

.card-tabs #tabspanel.nav-tabs .nav-link .badge {
    /*contadores*/
    margin-left: 5px;
    background-color: var(--main-counter-color);
    color: var(--main-detach-color);
}
.welcome-anonymous .card {
    --tblr-card-border-radius: 4px;
    box-shadow: rgb(30 41 59 / 4%) 0 2px 4px 0;
    border: 1px solid rgba(98, 105, 118, 0.16);
    background: #fff9;
    border-radius: var(--tblr-card-border-radius);
    transition: transform 0.3s ease-out, opacity 0.3s ease-out, box-shadow 0.3s ease-out;
}
.sidebar #navbar-menu .nav-item:hover .nav-link {
    border-left-color: #F30B47;
    color: #F30B47;
    background-color: rgba(0, 0, 0, 0.1);
}
.sidebar #navbar-menu .nav-item .nav-link.show{
	border-left-color: #009EDF;
    color: #009EDF;
}
.sidebar #navbar-menu .nav-item .nav-link.active + .dropdown-menu .dropdown-item.active, .sidebar #navbar-menu .nav-item .nav-link.show + .dropdown-menu .dropdown-item.active {
    border-left-color: #F39014;
    color: #F39014;
    font-weight: bold;
}
.sidebar #navbar-menu .nav-item .nav-link.active + .dropdown-menu .dropdown-item.active, .sidebar #navbar-menu .nav-item .nav-link.show + .dropdown-menu .dropdown-item:hover{
	border-left-color: #F39014;
    color: #F39014;
}
body.navbar-collapsed .sidebar #navbar-menu .nav-item .nav-link.show, body.navbar-collapsed .sidebar #navbar-menu .nav-item .nav-link.active {
    background-color: #742A82;
    border-left-color: #009EDF;
    color: #009EDF;
}
.sidebar #navbar-menu .nav-item .nav-link.active {
    border-left-color: #009EDF;
    color: #009EDF;
    font-weight: bold;
}
.card-tabs #tabspanel.nav-tabs .nav-link.active {
    background: #fff;
    color: #742A82;
    border-left-color: #742A82;
    font-weight: bold;
}
.page-wrapper{
	background: #ccc;
}
.col-md-5 {
    flex: 0 0 auto;
    width: 50% !important;
    background: var(--login-logo-glpi) no-repeat;
    background-size: contain;
    background-position-x: center;
    background-position-y: top;
    margin-right: 2em;
    color: #000;
}
.container-tight {
    width: 40%;
    padding-right: var(--tblr-gutter-x, 1.5rem);
    padding-left: var(--tblr-gutter-x, 1.5rem);
    margin-right: auto;
    margin-left: 5vw;
	margin-top: 22vh;
}
.copyright{
	  color: #fff;
}</style>

   <link rel="shortcut icon" type="images/x-icon" href="/pics/favicon.ico" />

         <script type="text/javascript" src="/public/lib/base.min.js?v=37c889333497a20c719eac4def820cc9b08afcf8"></script>
         <script type="text/javascript" src="/js/common.min.js?v=37c889333497a20c719eac4def820cc9b08afcf8"></script>
   
   
   <script type="text/javascript">
//<![CDATA[

         $(function() {
            i18n.setLocale('en_US');
         });            $(function() {
               $.ajax({
                  type: 'GET',
                  url: '/front/locale.php?domain=glpi&v=37c889333497a20c719eac4def820cc9b08afcf8',
                  success: function(json) {
                     i18n.loadJSON(json, 'glpi');
                  }
               });
            });            $(function() {
               $.ajax({
                  type: 'GET',
                  url: '/front/locale.php?domain=oauthimap&v=938a149364e0611a53f1874c244852818824cea4',
                  success: function(json) {
                     i18n.loadJSON(json, 'oauthimap');
                  }
               });
            });            $(function() {
               $.ajax({
                  type: 'GET',
                  url: '/front/locale.php?domain=formcreator&v=f986bf18fd44f91f34943f4b7cace2ad5689f92f',
                  success: function(json) {
                     i18n.loadJSON(json, 'formcreator');
                  }
               });
            });            $(function() {
               $.ajax({
                  type: 'GET',
                  url: '/front/locale.php?domain=datainjection&v=2a5a6d596bc5c5e7becd828d52a14a1f15aa719e',
                  success: function(json) {
                     i18n.loadJSON(json, 'datainjection');
                  }
               });
            });            $(function() {
               $.ajax({
                  type: 'GET',
                  url: '/front/locale.php?domain=behaviors&v=b6326bfd025f60b96602d7a5842707c2311b359d',
                  success: function(json) {
                     i18n.loadJSON(json, 'behaviors');
                  }
               });
            });            $(function() {
               $.ajax({
                  type: 'GET',
                  url: '/front/locale.php?domain=telegrambot&v=705f3fa06080bef58cef4d8ed28097b08ccf1254',
                  success: function(json) {
                     i18n.loadJSON(json, 'telegrambot');
                  }
               });
            });            $(function() {
               $.ajax({
                  type: 'GET',
                  url: '/front/locale.php?domain=glpiinventory&v=3b938156b1883d7b76bfab01a58974da02130e2e',
                  success: function(json) {
                     i18n.loadJSON(json, 'glpiinventory');
                  }
               });
            });

//]]>
</script>
</head>

<body class="welcome-anonymous">
   <div class="page-anonymous">
      <div class="flex-fill d-flex flex-column justify-content-center py-4 mt-4">
                                                
         <div class="container-tight py-6" style="max-width: 60rem">
            <div class="text-center">
               <div class="col-md">
                  <span class="glpi-logo mb-4" title="GLPI"></span>
               </div>
            </div>
            <div class="card card-md">
               <div class="card-body">
                  <form action="/front/login.php" method="post" autocomplete="off"  data-submit-once>
      <input type="hidden" name="noAUTO" value="1" />
      <input type="hidden" name="redirect" value="" />
      <input type="hidden" name="_glpi_csrf_token" value="43a6b01fac1f9c40d08ad6c422401be8595b39c0a8f81f752b8ca197b283f2b0" />

      <div class="row justify-content-center">
         <div class="col-md-5">
            <div class="card-header mb-4">
               <h2 class="mx-auto">Login to your account</h2>
            </div>
            <div class="mb-3">
               <label class="form-label">Login</label>
               <input type="text" class="form-control" id="login_name" name="fielda64ee60dc9ae2b" placeholder="" tabindex="1" />
            </div>
            <div class="mb-4">
               <label class="form-label">
                  Password

                                       <span class="form-label-description">
                        <a href="/front/lostpassword.php?lostpassword=1">
                           Forgot Password?
                        </a>
                     </span>
                                 </label>
               <input type="password" class="form-control" name="fieldb64ee60dc9ae2d" placeholder="" autocomplete="off" tabindex="2" />
            </div>

            
            
                           <div class="mb-2">
                  <label class="form-check">
                     <input type="checkbox" class="form-check-input" name="fieldc64ee60dc9ae2e" checked />
                     <span class="form-check-label">Remember me</span>
                  </label>
               </div>
            
            <div class="form-footer">
               <button type="submit" name="submit" class="btn btn-primary w-100" tabindex="3">
                  Sign in
               </button>
            </div>

                     </div>

               </div>
   </form>
               </div>
            </div>

            <div class="text-center text-muted mt-3">
                  <a href="https://glpi-project.org/" title="Powered by Teclib and contributors" class="copyright">GLPI Copyright (C) 2015-2023 Teclib' and contributors</a>
            </div>
         </div>
      </div>
   </div>

   <script type="text/javascript">
   $(function () {
$('#login_name').focus();
});
</script>
</body>
</html>
<div style="background-image: url('/front/cron.php');"></div></body></html>