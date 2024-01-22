<div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Signup</h1>
        </div>
      </div>
        <div class="row">
            <form action="../4.2/app/register.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="email" placeholder="Email" name="email" id="email"/>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" placeholder="Password" name="password" id="password"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="sign-up" value="Signup" />
                </div>
            </form>
        </div>
            <div class="row">
                <?php
                    if (isset($view_bag['status'])) {
                        echo $view_bag['status'];
                    }
                ?>
            </div>
    </div>
