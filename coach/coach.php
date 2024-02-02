<?php 
include('partials/menu.php');

 ?>
<div class="container">
    <h1 class="white-text">Coaches</h1>

    <a class="btn btn-primary" href="add-coach.php" role="button">Add new Coach</a>

    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">E-mail</th>
        <th scope="col">Phone no.</th>
        <th scope="col">Branch</th>
        <th scope="col">Gender</th>
        <th scope="col">Gender</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark Denson Malipol</td>
        <td>Mark@gmail.com</td>
        <td>630000000</td>
        <td>Sta. Cruz</td>
        <td>Male</td>
        <td><a class="btn btn-danger" href="add-coach.php" role="button">Add new Coach</a></td>
        </tr>
    </tbody>
    </table>
</div>

<?php 
include('partials/footer.php'); 

 ?>