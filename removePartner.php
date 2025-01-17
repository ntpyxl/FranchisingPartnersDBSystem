<?php require_once 'core/dbConfig.php' ?>
<?php require_once 'core/functions.php' ?>

<html>
    <head>
        <title>ntpyxl Franchising Partners</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <h3>Are you sure you want to remove this partner and their franchises?</h3> <br>

        <?php $partnerData = getPartnerByID($pdo, $_GET['partner_id']) ?>
        <?php $PartnerFranchisesData = getFranchisesByPartnerID($pdo, $_GET['partner_id']); ?>
        <form action="core/handleForms.php?partner_id=<?php echo $_GET['partner_id']; ?>" method="POST">
            <table>
                <tr>
                    <th>Partner ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Home Address</th>
                    <th>Date Registered</th>
                </tr>
                <tr>
                    <td><?php echo $partnerData['partner_id']?></td>
                    <td><?php echo $partnerData['first_name']?></td>
                    <td><?php echo $partnerData['last_name']?></td>
                    <td><?php echo $partnerData['age']?></td>
                    <td><?php echo $partnerData['gender']?></td>
                    <td><?php echo $partnerData['birthdate']?></td>
                    <td><?php echo $partnerData['home_address']?></td>
                    <td><?php echo $partnerData['date_registered']?></td>
                </tr>
            </table> <br>

            <table>
            <tr>
                <th>Franchise ID</th>
                <th>Franchise Name</th>
                <th>Franchise Location</th>
                <th>Date Franchised</th>
            </tr>

            <?php foreach ($PartnerFranchisesData as $row) { ?>
            <tr>
                <td><?php echo $row['franchise_id']?></td>
                <td><?php echo $row['business_name']?></td>
                <td><?php echo $row['franchise_location']?></td>
                <td><?php echo $row['date_franchised']?></td>
            </tr>
            <?php } ?>
        </table>

            <input type="submit" name="removePartnerButton" value="Remove">
        </form>

        <input type="submit" value="Cancel" onclick="window.location.href='index.php'">
    <body>
</html>