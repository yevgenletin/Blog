<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Post-Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
    <!-- Navbar -->
    <?php include('views/nav.php'); ?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/letter-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Post Me</h1>
                        <hr class="small">
                        <span class="subheading">Write somthing about you.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div id="sendPost"></div>
                <p>Write below your post</p>

                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form name="formuploadajax" id="formuploadajax" enctype="multipart/form-data">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="Title" name="title" id="title">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>

                    <div class="row control-group">

                        <label class="control-label">Select File (.json)</label>
                        <input id="file1" name="file1" type="file" class="file" accept=".json">
                        <div id="output"></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <br>

                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button id="update" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
    <!-- Footer -->
        <?php
        include('views/footer.php');
        ?>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>
    <script src="js/post.js"></script>
</body>

</html>
