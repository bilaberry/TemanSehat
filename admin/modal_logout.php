<div class='modal fade' id='logoutModal' tabindex='-1' role='dialog' aria-labelledby='logoutModalLabel' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='logoutModalLabel'>Konfirmasi Logout</h5>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <form action='../logout.php' method='POST'>
                <div class='modal-body'>
                    <p>Apakah Anda yakin ingin keluar dari akun ini?</p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Batal</button>
                    <button type='submit' class='btn btn-danger'>Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>