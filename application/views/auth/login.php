<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
    }

    .login-form {
        width: 100%;
        max-width: 400px;
        padding: 15px;
        margin: auto;
        border: 1px solid #ced4da;
        border-radius: .375rem;
        background-color: #ffffff;
    }

    .form-floating>label {
        color: #495057;
    }
</style>
<div class="login-form">
    <form method="post" action="<?= base_url()?>auth/aksi_login">
        <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" <?= isset($user['email'])?"value='".$user['email']."'":""?> id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2024</p>
    </form>
</div>