<?php
var_dump($_POST);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$zipcode = $_POST['zipCode'];

$sub = "Union Jobs = Good Jobs";
$msg =  "Dear Hawaii State Legislature,
 
We, $fname $lname,  are in support of the intent of HB321, the creation of a Medical Marijuana Dispensary system in Hawaii

    85% of people in Hawaii favor medical marijuana for patients who are seriously ill with cancer or other such diseases.

    Our fifteen year old medical marijuana law (our legislators trumpet it as 'The First in The Nation') does not work.  Of the thousands of Kaiser cancer patients who may be able to benefit from these treatments, none of them are being prescribed Medical Marijuana, and very few HMSA patients are able to get prescriptions either. 

    Why not? Because the law mandates that patients have to either grow their own medicine, or get it from an illegal drug dealer. What kind of cruel hoax is that?  

    We need safe, secure, doctor and pharmacist supervised Medical Marijuana dispensaries. And they should all be manned by unionized workers. Why unionized?  Because in this situation we all want a trained, safe and stable work force with roots in the community that offers decent pay and good benefits. We all want workers in these dispensaries who will be backed up by a solid employee organization that is bound by laws, work rules and are proven that it can be trusted.  

    Unions are the key to creating a successful dispensary system, and making sure the new Medical Marijuana laws are enforced. They will serve as a solid partner in preventing this industry from being run by fly-by-night operations, and those more interested in profit than worker protection, patient health and consistent levels of production and integrity.

     As a Hawaii voter, I ask you to take seriously the advantages of including Labor Peace language in  Bill 321, and set up a system that is safe, secure and protect patients, doctors and workers.

Signed: $fname $lname,
$zipcode";

    
$headers = 'From: '. $_POST['email'] . "\r\n" .
			'Reply-To: Linked Union' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

$retval = mail("taqi457@gmail.com",$sub,$msg,$headers);

if($retval) {
 echo "Done";   
} else {
  var_dump($retval);   
}



