<!-- Styles -->
<style>
   /* h1.page-header {
        margin-top: -5px;
    }

    .sidebar {
        padding-left: 0;
    }

    .main-container {
        background: #FFF;
        padding-top: 15px;
        margin-top: -20px;
    }

    .footer {
        width: 100%;
    }

    :focus {
        outline: none;
    }

    .side-menu {
        position: relative;
        width: 100%;
        height: 100%;
        background-color: #f8f8f8;
        border-right: 1px solid #e7e7e7;
    }

    .side-menu .navbar {
        border: none;
    }

    .side-menu .navbar-header {
        width: 100%;
        border-bottom: 1px solid #e7e7e7;
    }

    .side-menu .navbar-nav .active a {
        background-color: transparent;
        margin-right: -1px;
        border-right: 5px solid #e7e7e7;
    }

    .side-menu .navbar-nav li {
        display: block;
        width: 100%;
        border-bottom: 1px solid #e7e7e7;
    }

    .side-menu .navbar-nav li a {
        padding: 15px;
    }

    .side-menu .navbar-nav li a .glyphicon {
        padding-right: 10px;
    }

    .side-menu #dropdown {
        border: 0;
        margin-bottom: 0;
        border-radius: 0;
        background-color: transparent;
        box-shadow: none;
    }

    .side-menu #dropdown .caret {
        float: right;
        margin: 9px 5px 0;
    }

    .side-menu #dropdown .indicator {
        float: right;
    }

    .side-menu #dropdown > a {
        border-bottom: 1px solid #e7e7e7;
    }

    .side-menu #dropdown .panel-body {
        padding: 0;
        background-color: #f3f3f3;
    }

    .side-menu #dropdown .panel-body .navbar-nav {
        width: 100%;
    }

    .side-menu #dropdown .panel-body .navbar-nav li {
        padding-left: 15px;
        border-bottom: 1px solid #e7e7e7;
    }

    .side-menu #dropdown .panel-body .navbar-nav li:last-child {
        border-bottom: none;
    }

    .side-menu #dropdown .panel-body .panel > a {
        margin-left: -20px;
        padding-left: 35px;
    }

    .side-menu #dropdown .panel-body .panel-body {
        margin-left: -15px;
    }

    .side-menu #dropdown .panel-body .panel-body li {
        padding-left: 30px;
    }

    .side-menu #dropdown .panel-body .panel-body li:last-child {
        border-bottom: 1px solid #e7e7e7;
    }

    .side-menu #search-trigger {
        background-color: #f3f3f3;
        border: 0;
        border-radius: 0;
        position: absolute;
        top: 0;
        right: 0;
        padding: 15px 18px;
    }

    .side-menu .brand-name-wrapper {
        min-height: 50px;
    }

    .side-menu .brand-name-wrapper .navbar-brand {
        display: block;
    }

    .side-menu #search {
        position: relative;
        z-index: 1000;
    }

    .side-menu #search .panel-body {
        padding: 0;
    }

    .side-menu #search .panel-body .navbar-form {
        padding: 0;
        padding-right: 50px;
        width: 100%;
        margin: 0;
        position: relative;
        border-top: 1px solid #e7e7e7;
    }

    .side-menu #search .panel-body .navbar-form .form-group {
        width: 100%;
        position: relative;
    }

    .side-menu #search .panel-body .navbar-form input {
        border: 0;
        border-radius: 0;
        box-shadow: none;
        width: 100%;
        height: 50px;
    }

    .side-menu #search .panel-body .navbar-form .btn {
        position: absolute;
        right: 0;
        top: 0;
        border: 0;
        border-radius: 0;
        background-color: #f3f3f3;
        padding: 15px 18px;
    }

    !* Main body section *!
    .side-body {
        margin-left: 310px;
    }

    !* small screen *!
    @media (max-width: 768px) {
        .side-menu {
            position: relative;
            width: 100%;
            height: 0;
            border-right: 0;
        }

        .side-menu .navbar {
            z-index: 999;
            position: relative;
            height: 0;
            min-height: 0;
            background-color: none !important;
            border-color: none !important;
        }

        .side-menu .brand-name-wrapper .navbar-brand {
            display: inline-block;
        }

        !* Slide in animation *!
        @-moz-keyframes slidein {
            0% {
                left: -300px;
            }
            100% {
                left: 10px;
            }
        }
        @-webkit-keyframes slidein {
            0% {
                left: -300px;
            }
            100% {
                left: 10px;
            }
        }
        @keyframes slidein {
            0% {
                left: -300px;
            }
            100% {
                left: 10px;
            }
        }
        @-moz-keyframes slideout {
            0% {
                left: 0;
            }
            100% {
                left: -300px;
            }
        }
        @-webkit-keyframes slideout {
            0% {
                left: 0;
            }
            100% {
                left: -300px;
            }
        }
        @keyframes slideout {
            0% {
                left: 0;
            }
            100% {
                left: -300px;
            }
        }
        !* Slide side menu*!
        !* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment *!
        .side-menu-container > .navbar-nav.slide-in {
            -moz-animation: slidein 300ms forwards;
            -o-animation: slidein 300ms forwards;
            -webkit-animation: slidein 300ms forwards;
            animation: slidein 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        .side-menu-container > .navbar-nav {
            !* Add position:absolute for scrollable menu -> see top comment *!
            position: fixed;
            left: -300px;
            width: 300px;
            top: 43px;
            height: 100%;
            border-right: 1px solid #e7e7e7;
            background-color: #f8f8f8;
            overflow: auto;
            -moz-animation: slideout 300ms forwards;
            -o-animation: slideout 300ms forwards;
            -webkit-animation: slideout 300ms forwards;
            animation: slideout 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        @-moz-keyframes bodyslidein {
            0% {
                left: 0;
            }
            100% {
                left: 300px;
            }
        }
        @-webkit-keyframes bodyslidein {
            0% {
                left: 0;
            }
            100% {
                left: 300px;
            }
        }
        @keyframes bodyslidein {
            0% {
                left: 0;
            }
            100% {
                left: 300px;
            }
        }
        @-moz-keyframes bodyslideout {
            0% {
                left: 300px;
            }
            100% {
                left: 0;
            }
        }
        @-webkit-keyframes bodyslideout {
            0% {
                left: 300px;
            }
            100% {
                left: 0;
            }
        }
        @keyframes bodyslideout {
            0% {
                left: 300px;
            }
            100% {
                left: 0;
            }
        }
        !* Slide side body*!
        .side-body {
            margin-left: 5px;
            margin-top: 70px;
            position: relative;
            -moz-animation: bodyslideout 300ms forwards;
            -o-animation: bodyslideout 300ms forwards;
            -webkit-animation: bodyslideout 300ms forwards;
            animation: bodyslideout 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        .body-slide-in {
            -moz-animation: bodyslidein 300ms forwards;
            -o-animation: bodyslidein 300ms forwards;
            -webkit-animation: bodyslidein 300ms forwards;
            animation: bodyslidein 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        !* Hamburger *!
        .navbar-toggle-sidebar {
            border: 0;
            float: left;
            padding: 18px;
            margin: 0;
            border-radius: 0;
            background-color: #f3f3f3;
        }

        !* Search *!
        #search .panel-body .navbar-form {
            border-bottom: 0;
        }

        #search .panel-body .navbar-form .form-group {
            margin: 0;
        }

        .side-menu .navbar-header {
            !* this is probably redundant *!
            position: fixed;
            z-index: 3;
            background-color: #f8f8f8;
        }

        !* Dropdown tweek *!
        #dropdown .panel-body .navbar-nav {
            margin: 0;
        }
    }*/
    .nav>li>a:focus, .nav>li>a:hover {
        background-color: #6a8da4;
    }

   /* Style the tab */
   .tab {
       float: left;
       border: 1px solid #ccc;
       background-color: #f1f1f1;
       width: 20%;
       padding: 0px 0px 0px 0px;
   }

   /* Style the buttons that are used to open the tab content */
   .tab button {
       display: block;
       background-color: inherit;
       color: black;
       padding: 22px 16px;
       width: 100%;
       border: none;
       outline: none;
       text-align: left;
       cursor: pointer;
       transition: 0.3s;
   }

   /* Change background color of buttons on hover */
   .tab button:hover {
       background-color: #ddd;
   }

   /* Create an active/current "tab button" class */
   .tab button.active {
       background-color: #ccc;
   }

   /* Style the tab content */
   .tabcontent {
       float: left;
       padding: 12px 12px;
       border: 1px solid #ccc;
       width: 80%;
       border-left: none;
   }

    table > tbody > tr:hover {
        background-color: #dbe3e4;
    }
</style>
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>