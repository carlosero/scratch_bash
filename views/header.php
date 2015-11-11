<html>
<head>
<title>ScratchBash</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <script Language="JavaScript">
    function solonumeros(e,idi) 
    {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        Pnum = '0123456789';
        especiales = '8-37-39-46-13';
        tecla_especial = false
        for (var i in especiales) 
        {
            if (key == especiales[i]) 
            {
                tecla_especial = true;
                break;
            }
        }
        if (e.keyCode == "13" && idi == "nuno") 
        {
            document.getElementById("ndos").focus();
        } else if (e.keyCode == "13" && idi == "ndos") 
        {
            document.getElementById("ntres").focus();
        } else if (e.keyCode == "13" && idi == "ntres") 
        {

        } 
        if (Pnum.indexOf(tecla) == -1 && !tecla_especial) 
        {
            return false;
        }
            
    }
    function habilitarboton(donde)
    {
        if (donde == "login")
        {
            if (document.getElementById("user_user").value != "" && document.getElementById("user_password").value != "")
            {
                document.getElementById("user_login").disabled = false;
            }else
            {
                document.getElementById("user_login").disabled = true;
            }
        }else if (donde == "register")
        {
            if (document.getElementById("user_name").value != "" && document.getElementById("user_user").value != "" && document.getElementById("user_password").value != "" && document.getElementById("user_password_confirmation").value != "")
            {
                document.getElementById("user_login").disabled = false;
            }else
            {
                document.getElementById("user_login").disabled = true;
            }
        }
        
    }
    </script>
</head>
<body>