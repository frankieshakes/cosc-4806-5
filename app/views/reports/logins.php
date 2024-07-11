<?php require_once 'app/views/templates/header.php' ?>
<div class="container-fluid bg-light-subtle">

  <div class="row border-top">
    <div class="sidebar border-end col-md-3 col-lg-2 p-0">
      <div class="offcanvas-md offcanvas-end" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">

        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/reports">
                <svg class="bi"><use xlink:href="#house-fill"></use></svg>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="/reports/reminders">
                <svg class="bi"><use xlink:href="#check2-square"></use></svg>
                Reminders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" href="/reports/logins">
                <svg class="bi"><use xlink:href="#door-open-fill"></use></svg>
                Logins
              </a>
            </li>

          </ul>          
        </div>
      </div>
    </div>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container-fluid">
      <div class="row">
        <!--
        <pre>
        <?php print_r($data['loginsReport']); ?>
          </pre>
        -->
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Logins</h1>
        </div>
        <div class="col-12 mb-3">
          <div class="card h-lg-100 overflow-hidden shadow">
            <div class="card-body p-0">
              <div class="table-responsive scrollbar">
                <table class="table table-dashboard mb-0 table-borderless fs-10 border-200">
                  <thead class="border-bottom">
                    <tr>
                      <th class="bg-primary-subtle bg-gradient fw-medium ps-3">Username</th>
                      <th class="bg-primary-subtle bg-gradient fw-medium text-end">Login Attempts</th>
                      <th class="bg-primary-subtle bg-gradient fw-medium text-end pe-3">Successful Logins</th>
<th class="bg-primary-subtle bg-gradient fw-medium text-end pe-3">Failed Logins</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data['loginsReport'] as $login): ?>
                    <tr class="border-bottom border-200">
                      <td class="ps-3">
                        <?php echo $login['username']; ?>
                      </td>
                      <td class="align-middle fw-semi-bold text-end">
                        <?php echo $login['total']; ?>
                      </td>
                      <td class="align-middle fw-semi-bold text-end">
                        <?php echo $login['success']; ?>
                      </td>
<td class="align-middle fw-semi-bold text-end pe-3">
                        <?php echo $login['failure']; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer bg-body-tertiary py-2 px-3">
              <div class="row flex-between-center">
                <div class="col-auto">
                  Total Users: <?php echo count($data["loginsReport"]); ?>
                </div>
              </div>
            </div>
          </div>
        </div>      
      </div>
    </div>
  </main>
</div>

<?php require_once 'app/views/templates/footer.php' ?>