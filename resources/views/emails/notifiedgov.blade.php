<html>
@php
date_default_timezone_set('Asia/Jakarta');
@endphp

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px #EE5724;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;" src="https://raw.githubusercontent.com/tonnyheru/cdn-pengadilan/refs/heads/main/logo.png" alt="Logo Pengadilan Negeri Bale Bandung"></th>
        <th style="text-align:right;font-weight:400;">{{ date('Y-m-d H:i:s') }}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="padding:20px;">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;">Yang terhormat Bapak/Ibu,</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;">Mohon ditindak lanjuti usulan pada sistem dengan data pemohon sebagai berikut : </p>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Nama Pemohon</span> {{ @$data['nama'] }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Nomor Telepon</span> {{ @$data['no_telp'] }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Nomor Perkara</span> {{ @$data['no_perkara'] }}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Alamat</span> {{ @$data['alamat'] }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> {{ @$data['email'] }}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Jenis Perkara</span> {{ @$data['jenis_perkara'] }}</p>
        </td>
      </tr>
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong> <strong>Pengadilan Negeri Bale Bandung</strong><br> Jl. Jaksa Naranata, Baleendah, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375<br><br>
          <b>Phone:</b> 0896-5900-0010
        </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>