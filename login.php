<?php include "template/header.php" ?>
  
    <!-- Login -->
    <form>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
    </form>
    <a href="table.php">
      <button type="nanti jadi submit trus pindahin ke form" class="btn btn-primary">Submit</button>
    </a>
    <!-- Login -->
    <!-- login petclinic -->
    <h1>pet clinic</h1>
    <h3>form login</h3>
    <form method="post" action="login_query.php">
      <table>
        <tr>
          <td>Username</td>
          <td>: <input type="text" name="username" required /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>: <input type="password" name="password" id="pass" required /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;<input type="checkbox" onclick="show()">Show Password</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;
            <input type="submit" name="login" value="LOGIN">
            <input type="reset" name="reset" value="RESET">
          </td>
        </tr>
      </table>
    </form>
    <script>  
    function show() {
      var x = document.getElementById("pass");
      if (x.type === "password") {
          x.type = "text";
      } else {
          x.type = "password";
      }
    }
</body>
</html>
