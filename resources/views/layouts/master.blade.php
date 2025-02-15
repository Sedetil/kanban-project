<!DOCTYPE html>

<html lang="en">


<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="{{ asset('style.css') }}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <title>@yield('pageTitle')</title>

  <style>
    /* Neo Brutalism Styles */
    body {
      background-color: #f0f0f0;
      font-family: 'Inter', sans-serif;
      margin: 0;
    }
    .container {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }
    .sidebar {
      width: 20%;
      background-color: #55acc8;
      transition: transform 0.3s ease;
      position: relative;
      transform: translateX(0);
    }
    .main {
      flex-grow: 1;
      padding: 20px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      align-items: center; /* Center content horizontally */
      transition: margin-left 0.3s ease; /* Smooth transition for shifting */
    }
    .menu-icon {
      position: absolute;
      top: 10px;
      left: 10px;
      cursor: pointer;
      font-size: 30px;
      z-index: 1001; /* Ensure it is above other elements */
    }
    .form-button, .task-list-button {
      background-color: #ffcc00;
      border: 2px solid #000;
      transition: transform 0.2s;
    }
    .form-button:hover, .task-list-button:hover {
      transform: scale(1.05);
    }
    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
      .sidebar {
        width: 100%;
        transform: translateX(-100%);
        position: absolute;
        z-index: 1000;
        height: 100%;
      }
      .main {
        width: 100%;
      }
      .menu-icon {
        display: block;
      }
    }
  </style>

</head>


<body>

  <div class="container">

    <div class="sidebar" id="sidebar">

      <div class="sidebar-container">
        <a class="sidebar-link" href="{{ route('home') }}">
          <span class="material-icons sidebar-icon">home</span>
          <p class="sidebar-text">Home</p>
        </a>
        <a class="sidebar-link" href="{{ route('tasks.index') }}">
          <span class="material-icons sidebar-icon">list</span>
          <p class="sidebar-text">Task List</p>
        </a>
      </div>

    </div>

    <div class="main" id="main-content">

      <span class="material-icons menu-icon" id="menu-icon">menu</span>

      @yield('main')

    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function showAlert(message) {
      Swal.fire({
        title: 'Success!',
        text: message,
        icon: 'success',
        customClass: {
          icon: 'animate__animated animate__bounceIn'
        },
        showClass: {
          popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
          popup: 'animate__animated animate__fadeOutUp'
        },
        confirmButtonText: 'OK'
      });
    }

    document.getElementById('menu-icon').addEventListener('click', function() {
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('main-content');
      const isSidebarVisible = sidebar.style.transform === 'translateX(0px)' || sidebar.style.transform === '';

      if (isSidebarVisible) {
        sidebar.style.transform = 'translateX(-100%)';
        mainContent.style.marginLeft = '0'; // Center the main content
      } else {
        sidebar.style.transform = 'translateX(0px)';
        mainContent.style.marginLeft = '20%'; // Adjust according to sidebar width
      }
    });
  </script>

</body>


</html>