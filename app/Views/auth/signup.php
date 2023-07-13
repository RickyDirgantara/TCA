<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <title>Responsive Form with Bootstrap</title>
  <style>
    body {
      background-color: #ffffff;
    }

    .background {
      width: 100%;
      max-width: 430px;
      height: 520px;
      position: absolute;
      transform: translate(-50%,-50%);
      left: 50%;
      top: 50%;
    }

    .daftar-form {
      overflow-y: auto;
      max-height: 700px;
      height: auto;
      width: 100%;
      max-width: 700px;
      background-color: rgba(255,255,255,0.13);
      position: absolute;
      transform: translate(-50%,-50%);
      top: 50%;
      left: 50%;
      border-radius: 10px;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(255,255,255,0.1);
      box-shadow: 0 0 40px rgba(8,7,16,0.6);
      padding: 10px 35px;
    }

    .daftar-form * {
      font-family: 'Poppins',sans-serif;
      color: #000000;
      letter-spacing: 0.5px;
      outline: none;
      border: none;
    }

    .daftar-form h3 {
      font-size: 32px;
      font-weight: 500;
      line-height: 42px;
      text-align: center;
    }

    .daftar-form label {
      display: block;
      margin-top: 30px;
      font-size: 16px;
      font-weight: 500;
    }

    .daftar-form input {
      display: block;
      height: 50px;
      width: 100%;
      background-color: rgba(242, 239, 239, 0.788);
      border-radius: 3px;
      padding: 0 10px;
      margin-top: 8px;
      font-size: 14px;
      font-weight: 300;
    }

    .daftar-form ::placeholder {
      color: rgba(255, 255, 255, 0);
    }

    .daftar-form button {
      margin-top: 50px;
      width: 100%;
      background-color: #080710;
      color: #ffffff;
      padding: 15px 0;
      font-size: 18px;
      font-weight: 600;
      border-radius: 5px;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      .background {
        max-width: 100%;
        width: 90%;
      }

      .daftar-form {
        max-width: 100%;
        width: 90%;
      }
    }

    @media (max-width: 400px) {
      .daftar-form h3 {
        font-size: 24px;
        line-height: 34px;
      }
    }
  </style>
</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  <form class="daftar-form" action="/save" method="POST">
    <h3>Daftar</h3>

    <div class="mb-3">
      <label for="full_name" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
      <?php if ($validation && $validation->hasError('full_name')) : ?>
        <div class="text-danger"><?php echo $validation->getError('full_name'); ?></div>
    <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      <?php if ($validation && $validation->hasError('username')) : ?>
        <div class="text-danger"><?php echo $validation->getError('username'); ?></div>
    <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
      <?php if ($validation && $validation->hasError('email')) : ?>
        <div class="text-danger"><?php echo $validation->getError('email'); ?></div>
    <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="********">
      <?php if ($validation && $validation->hasError('password')) : ?>
        <div class="text-danger"><?php echo $validation->getError('password'); ?></div>
    <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="phone_number" class="form-label">Phone Number</label>
      <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="+62xxxxxxxxxxxx">
      <?php if ($validation && $validation->hasError('phone_number')) : ?>
        <div class="text-danger"><?php echo $validation->getError('phone_number'); ?></div>
    <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="address" name="address" placeholder="Your Address">
      <?php if ($validation && $validation->hasError('address')) : ?>
        <div class="text-danger"><?php echo $validation->getError('address'); ?></div>
    <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="role" class="form-label">Register as:</label>
      <select class="form-select" id="role" name="role">
        <option selected>Choose..</option>
        <option value="seller">Seller</option>
        <option value="buyer">Buyer</option>
      </select>
      <?php if ($validation && $validation->hasError('role')) : ?>
        <div class="text-danger"><?php echo $validation->getError('role'); ?></div>
    <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary btn-lg">Daftar</button>
  </form>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
