<div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/ " target="_blank">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFwAAABcCAMAAADUMSJqAAAAtFBMVEX///+lKC4AM2YAH1zI0tykJCquQkgAJV+iExyMnbPYqqsALWLbsLJKZIhOZ4mTpLieAACsO0EALmkAKGYAPnK+y9egCxbu29zWpacAKGCjGSH16em3x9U8aY8ASHjn7fFriKQvXYX78/PAcnXOlpjjx8jr0tMAFlkAG1vKiYyfAAje5OrT2+IANGxfgaCzT1K8Z2urMjq2W1+hsMJ9j6ZedpUxVH3EfH/du7xNdJYbVIAAEV00fgH4AAADg0lEQVRoge2Zb3eiOhDGJzWxVNkuWgg2UKj8UxCrolut+/2/1waorXfJ7W0k7t096/MGDznn55yZyYSZAPx9is7I1o3e2dgxI1pyJrZDCCLIOQs76BKEEFucBb5kqJS2PQM7pahWNlLO1jN0UBYrZicaehdTG9QyUd5FuirZdaIcmR4qhIcM/VNUXVAjin4W3Sli6002IoqCamdNNqevVLADRkRwxAoF7K6YzetA++LeSJQjetugChLlKKh2K7YoUY7og6AF2/6Q3S6oAf23YL65/eTiHgyopmmMCXOR0UrGqXXASexagmxkURzHCVfr2r5owjW9LfSXwAVu+V3g+fOXg24P+rJWBMeTfkOdG1XwzlVD1xf4Bf5HwD/fHF3gn4d//TXwwQV+gf++8M9/xv0HfPWXwn2vCb9/L1zt4DDuN+mm/xFcYpK2uReYfvsBnEp8l7sCp191vr2uCrpFKtHI+RMB/Or+ujLeEfXnMn3crcDpnF7ZnjR7OiI1o7OmInjHLdd6WgPOUhk4PAtM73vVkqBDz+Q687zfpE9wtdQ0XLp1dhuO6TxWC7umy+UHFuuf6J3XPBf0ckR+TGT1r4/8PdnUb9uHs5a/mXaqrdq/nzxb9TtHkOPstGGFv/7mTadX3iY/vCkEqaJq7hcKnKJqyJ0KNqeioV+wFbBl6uEH0ldNf5MWo9BdmrxmgjMaaIIEN9pM5HSDrRaL7ooI50Os5TzOGVBSSpDeiBZtpnGVUiaeU2pIxQ2UHdKGuwllUWuzaznRIKNvriGMZt2RInSlZBSuaFaKLba9c1xrBU6gwmCrPC2x67ulyoLoW/wHBqdU8PpPp8LH5ffV0xDv58O7u+ELuOVz+gSGkWVGfe6kJ1/gPHgc/mji8X42mz3Mfc/8muf5DGwbjbjlNrc6KiDge6j86YAjs5ve4GNw3fEemy+AMeZVPUB8w4eGkUK0dPgRFFJeXcLlKpNI+nd4/n1ozvL5xv8+nD+VcB105iSGHS2KLcQsiDNYFhBKVPUjyy38sMeci13zsYZvQwC0G1F+BPXIMjSCZQSRBPzFvFmvx14+3ucYPwzBMzd4fYCnBQCNo27PCPSVYycgCc/NIdcN7Od3VbZY3vCudgvTwTa2BSlx3W1A0yWCIoJU5rDzLcvi8bNKlR9aPq5fQMTzIklTB+IRf4KdpgH0Ytipv3L9v/UDaD5fLPggrY8AAAAASUVORK5CYII=" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">UBG Project</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <?php echo view('leftmenu'); ?>
    </div>


    <div class="sidenav-footer mx-3 ">
      <?php if(logged_in()){ ?>
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-30 mx-auto rounded-circle img-fluid border border-2 border-white" src="/assets/img/team-2.jpg" alt="sidebar_illustration">
      </div>
      <a href="/profile" class="btn btn-dark btn-sm w-100 mb-3">Thông tin cá nhân</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="/logout" type="button">Thoát</a>
      <?php }else{ ?>
        <div class="card card-plain shadow-none" id="sidenavCard">
          <img class="w-30 mx-auto rounded-circle img-fluid border border-2 border-white" src="/assets/img/team-2.jpg" alt="sidebar_illustration">
        </div>
        <a href="/login" class="btn btn-dark btn-sm w-100 mb-3">Đăng nhập</a>
        <a class="btn btn-primary btn-sm mb-0 w-100" href="/register" type="button">Đăng ký</a>
      <?php } ?>
    </div>

    
  </aside>