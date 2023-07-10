
<?php
/**
 
 */
include('../app/config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="<?php echo $URL; ?>/public/favicon.ico" type="image/x-icon">
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta
    name="description"
    content="SwaggerUI"
  />
  <title>Documentacion API</title>
  <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist@4.5.0/swagger-ui.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Helvetica Neue", Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .logo {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo img {
      max-width: 200px;
      height: auto;
    }

    .swagger-ui-tabs {
      display: flex;
      flex-direction: column;
      margin-left: 20px;
    }

    .swagger-ui-tab {
      padding: 10px 0;
      text-align: left;
      cursor: pointer;
      color: #333;
      font-weight: bold;
      font-size: 14px;
      text-transform: uppercase;
      transition: color 0.3s;
    }

    .swagger-ui-tab:hover,
    .swagger-ui-tab.active {
      color: #007bff;
    }

    .swagger-ui-content {
      display: none;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .swagger-ui-content.active {
      display: block;
    }

    .content-wrapper {
      display: flex;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sidebar {
      flex: 0 0 200px;
      padding: 20px;
    }

    .main-content {
      flex: 1;
      padding: 20px;
    }
  </style>
</head>
<body>
<div class="content-wrapper">
  <div class="sidebar">
    <div class="logo">
      <img src="https://i.imgur.com/4uwAKk9.png" alt="Logo">
    </div>
    <div class="swagger-ui-tabs">
      <div class="swagger-ui-tab active" id="tab-inicio">Inicio</div>
      <div class="swagger-ui-tab" id="tab-bodega">codigo de seguimiento</div>
      <div class="swagger-ui-tab" id="tab-pedidos-sucursal">Pedidos Sucursal</div>
      <div class="swagger-ui-tab" id="tab-pedidos-bodega">Pedidos Bodega</div>
    </div>
  </div>
  <div class="main-content">
    <div class="swagger-ui-content active" id="content-inicio">
      <div id="swagger-ui1">
        <div class="intro-wrapper">
          <div class="intro">
            <h1>Bienvenido a la documentación</h1>
            <p>Aquí encontrarás toda la información necesaria para utilizar nuestra API.</p>
            <p>¡Explora las diferentes secciones y descubre cómo utilizar nuestros servicios de manera eficiente!</p>
          </div>
        </div>
      </div>
    </div>
    <div class="swagger-ui-content" id="content-bodega">
      <div id="swagger-ui2"></div>
    </div>
    <div class="swagger-ui-content" id="content-pedidos-sucursal">
      <div id="swagger-ui3"></div>
    </div>
    <div class="swagger-ui-content" id="content-pedidos-bodega">
      <div id="swagger-ui4"></div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/swagger-ui-dist@4.5.0/swagger-ui-bundle.js" crossorigin></script>
<script>
  window.onload = () => {
    const tabs = document.querySelectorAll('.swagger-ui-tab');
    const contents = document.querySelectorAll('.swagger-ui-content');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const targetId = tab.id.replace('tab-', 'content-');

        tabs.forEach(t => t.classList.remove('active'));
        contents.forEach(c => c.classList.remove('active'));

        tab.classList.add('active');
        document.getElementById(targetId).classList.add('active');
      });
    });

    SwaggerUIBundle({
      url: 'http://localhost/cybercore/api/codigo-seguimiento.yaml',
      dom_id: '#swagger-ui2',
    });

    SwaggerUIBundle({
      url: 'http://localhost/cybercore/api/pedidos-sucursal.yaml',
      dom_id: '#swagger-ui3',
    });

    SwaggerUIBundle({
      url: 'http://localhost/cybercore/api/pedidos-bodega.yaml',
      dom_id: '#swagger-ui4',
    });
  };
</script>
</body>
</html>
