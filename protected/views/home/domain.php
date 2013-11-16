<div class="text-content">
<p>
  Nama domain (domain name) adalah nama unik yang diberikan untuk mengidentifikasi
 nama server komputer seperti web server atau email server di jaringan komputer
 ataupun internet. Nama domain berfungsi untuk mempermudah pengguna di internet 
 pada saat melakukan akses ke server, selain juga dipakai untuk mengingat nama server 
 yang dikunjungi tanpa harus mengenal deretan angka yang rumit yang dikenal sebagai alamat IP. 
 Nama domain ini juga dikenal sebagai sebuah kesatuan dari sebuah situs web seperti contohnya 
 google.com, yahoo.com, wikipedia.org dan indonesia.go.id. Nama domain kadang-kadang 
 disebut pula dengan istilah URL, atau alamat website.
</p>

<p>
  Untuk penamaan domain tidak diperbolehkan menggunakan spasi, garis bawah/ 
  underscore dan symbol lainnya. Dimana nama domain hanya diperbolehkan mengandung huruf, 
  angka dan dash symbol (-).
</p>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#333333" class="table-custom">
  <tbody><tr bgcolor="#333333">
    <td><div align="center"><font color="#FFFFFF"><strong>Jenis Domain</strong></font></div></td>
    <td width="376"><font color="#FFFFFF"><strong>Harga (Rp.)</strong></font></td>
    <!-- <td>&nbsp;</td> -->
    </tr>
  <?php foreach ($domain as $key => $value): ?>
  <tr bgcolor="#EAEAEA">
    <td width="113" <?php echo (($key+1) % 2 == 0)?'bgcolor="#CCCCCC"':'' ?>><div align="left"><strong><span class="style55"><?php echo $value->tld ?></span></strong></div></td>
    <td <?php echo (($key+1) % 2 == 0)?'bgcolor="#CCCCCC"':'' ?>><div align="left"><strong><font size="2"><span class="style19"><?php if($value->mask>$value->price): ?><strike>Rp. <?php echo number_format($value->mask,0) ?>,- / tahun</strike><?php endif; ?></span> Rp. <?php echo number_format($value->price,0) ?>,- </font><font size="1">/
    tahun</font></strong></div></td>
    <!-- <td <?php echo (($key+1) % 2 == 0)?'bgcolor="#CCCCCC"':'' ?> style="text-align: center;"><a class="btn btn-primary" href="<?php echo CHtml::normalizeUrl(array('/home/domainpilih', 'tld'=>$value->tld)); ?>">Beli</a></td> -->
  </tr>
  <?php endforeach ?>
  <tr bgcolor="#EAEAEA">
    <td bgcolor="#666666">&nbsp;</td>
    <td bgcolor="#666666">&nbsp;</td>
    <!-- <td bgcolor="#666666">&nbsp;</td> -->
    </tr>
  <?php foreach ($domainId as $key => $value): (array)$value?>
  <tr bgcolor="#EAEAEA">
    <td width="113" <?php echo (($key+1) % 2 == 0)?'bgcolor="#CCCCCC"':'' ?>><div align="left"><strong><span class="style55"><?php echo $value->tld ?></span></strong></div></td>
    <td <?php echo (($key+1) % 2 == 0)?'bgcolor="#CCCCCC"':'' ?>><div align="left"><strong><font size="2"><span class="style19"><?php if($value->mask>$value->price): ?><strike>Rp. <?php echo number_format($value->mask,0) ?>,- / tahun</strike><?php endif; ?></span> Rp. <?php echo number_format($value->price,0) ?>,- </font><font size="1">/
    tahun</font></strong></div></td>
    <!-- <td <?php echo (($key+1) % 2 == 0)?'bgcolor="#CCCCCC"':'' ?> style="text-align: center;"><a class="btn btn-primary" href="<?php echo CHtml::normalizeUrl(array('/home/domainpilih', 'tld'=>$value->tld)); ?>">Beli</a></td> -->
  </tr>
  <?php endforeach ?>
</tbody></table>
</div>