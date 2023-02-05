<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard ONG MNG</title>

    <link href="<?php echo ROOT_PATH; ?>assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    
    <script src="<?php echo ROOT_PATH; ?>assets/js/java.js" type="text/javascript"></script>
    

    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    
    </head>

<body>
    <!-- Main container -->
    <div class="main-container">
        <div class="sidebar">
            <a href="http://iasi.esn.ro/">
                <img class="main-logo" src="<?php echo ROOT_PATH; ?>assets/logo/RO-iasi-logo-colour.png"
                    alt="Erasmus Student Network Iasi">
            </a>
            <div class="main-buttons">
            
                <a href="<?php echo ROOT_URL; ?>news"><img class="button-icon"
                        src="<?php echo ROOT_PATH; ?>assets/icons/announcements.png">News</a>
            	<?php if(isset($_SESSION['is_logged_in'])) : ?>
                <a href="<?php echo ROOT_URL; ?>myrequests"><img class="button-icon"
                        src="<?php echo ROOT_PATH; ?>assets/icons/requests.png">My Requests</a>
                <a href="<?php echo ROOT_URL; ?>members"><img class="button-icon"
                        src="<?php echo ROOT_PATH; ?>assets/icons/members.png">Members</a>
                <?php if(isset($_SESSION['isAdmin'])) : ?>
                <a class="" href="<?php echo ROOT_URL; ?>activities"><img class="button-icon"
                        src="<?php echo ROOT_PATH; ?>assets/icons/activities.png">Activities</a>
                <a href="<?php echo ROOT_URL; ?>recruitment/applicants"><img class="button-icon"
                        src="<?php echo ROOT_PATH; ?>assets/icons/recruitments.png">Recruitment</a>
                <a href="<?php echo ROOT_URL; ?>onboarding/onboardingList"><img class="button-icon"
                        src="<?php echo ROOT_PATH; ?>assets/icons/onboarding.png">Onboarding</a>
                <a href="<?php echo ROOT_URL; ?>settings"><img class="button-icon"
                        src="<?php echo ROOT_PATH; ?>assets/icons/settings.png">Settings</a>
            <?php endif; endif; ?>
            </div>
        </div>
        <div class="main-content-container">
            <div class="content-header">
            <?php if(isset($_SESSION['is_logged_in'])) : ?>
                <table>
                    <tr>
                        <th>
                            <div class="content-header-th1">Welcome to ESN Iasi Dashboard</div>
                        </th>
                        <th>
                            <div class="content-header-th2"><a href="#"><img class="button-icon"
                                        src="<?php echo ROOT_PATH; ?>assets/icons/bell.png"></a></div>
                        </th>
                        <th>
                            <div class="content-header-th3">
                            <a href="<?php echo ROOT_URL; ?>users/logout"><?php echo $_SESSION['user_data']['name']; ?></a><img class="photo-member"
                                    src="<?php echo ROOT_PATH; ?>assets/poze membri/cristi-popa.jpg"></div>
                        </th>
                    </tr>
                </table>
            <?php else : ?>
                <table>
                    <tr>
                        <th>
                            <div class="content-header-th1">Welcome to ESN Iasi Dashboard</div>
                        </th>
                        <th>
                            <div class="content-header-th2">
                            <a href="<?php echo ROOT_URL; ?>users/login">Login</a></div>
                        </th>
                        <?php if(isset($_SESSION['is_logged_in'], $_SESSION['isAdmin'])) : ?>
                        <th>
                            <div class="content-header-th2">
                            <a href="<?php echo ROOT_URL; ?>users/register">Register</a></div>
                        </th>
                        <?php endif; ?>
                    </tr>
                </table>
            <?php endif; ?>
            </div>
            <div class="row">
                <?php Messages::display(); ?>
                <?php require($view); 
                ?>
            </div>
        </div>
</body>

</html>