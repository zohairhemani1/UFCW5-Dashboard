<!DOCTYPE html>
<html>

<head>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
</head>

<body>

<div ng-app="">
<div style="width:50%; display:inline-block;">
<form action="sendEmail.php" method="post">
<label>First name</label>
    <input type="text" name="fname" value="<?php echo $_GET["fname"]; ?>" readonly>
<br>
<label>Last name</label>
    <input type="text" name="lname" value="<?php echo  $_GET["lname"]; ?>" readonly>   
<br>
<input type="hidden" name="email" value="<?php  echo  $_GET["email"]; ?>">
<label>Zip Code</label>
    <input ng-model="zip" type="text" name="zipCode">
    <br>
<input type="submit" value="Email Petition">
<p>{{firstname + " " + lastname}}<p>
</form>
</div>
<div style="width:50%;display:inline-block; float:right; ">
    <p>
        Dear Hawaii State Legislature,
    </p>
    <p>
    We, <?php echo $_GET['fname']." ".$_GET['lname'] ?> , are in support of the intent of HB321, the creation of a Medical Marijuana Dispensary system in Hawaii.
    </p>
    <p>
        85% of people in Hawaii favor medical marijuana for patients who are seriously ill with cancer or other such diseases.
    </p>
    <p>
    Our fifteen year old medical marijuana law (our legislators trumpet it as "The First in The Nation") does not work.  Of the thousands of Kaiser cancer patients who may be able to benefit from these treatments, none of them are being prescribed Medical Marijuana, and very few HMSA patients are able to get prescriptions either. 
    </p>
    <p>
    Why not? Because the law mandates that patients have to either grow their own medicine, or get it from an illegal drug dealer. What kind of cruel hoax is that?  
    </p>
    <p>
    We need safe, secure, doctor and pharmacist supervised Medical Marijuana dispensaries. And they should all be manned by unionized workers. Why unionized?  Because in this situation we all want a trained, safe and stable work force with roots in the community that offers decent pay and good benefits. We all want workers in these dispensaries who will be backed up by a solid employee organization that is bound by laws, work rules and are proven that it can be trusted.  
    </p>
    <p>
    Unions are the key to creating a successful dispensary system, and making sure the new Medical Marijuana laws are enforced. They will serve as a solid partner in preventing this industry from being run by fly-by-night operations, and those more interested in profit than worker protection, patient health and consistent levels of production and integrity.
    </p>
    <p>
    <b> 
    <u>
     As a Hawaii voter, I ask you to take seriously the advantages of including Labor Peace language in  Bill 321, and set up a system that is safe, secure and protect patients, doctors and workers.
    </b>
    </u>
    </p>    
    Signed: <?php echo $_GET['fname']." ".$_GET['lname'] ?>
    <br>
    <p>
    {{zip}}
    </p>
</div>
</div>
</body>
</html>
