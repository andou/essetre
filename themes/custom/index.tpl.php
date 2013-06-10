<? if (empty($files)) header("HTTP/1.0 404 Not Found"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Index of <?= $config['bucket-name'].$dir ?></title>
  <link rel="stylesheet" type="text/css" href="<?= $config['base-path'] ?><?= $config['skin-path'] ?>/css/screen.css" media="all" />
</head>
<body>
  <div id="header">
    <h1><?= $config['page-header'] ?></h1>
  </div>  
  <div id="contents">
    
    <div class="breadcrumb">
      Index of 
      <ul>
        <li>
          <a href="<?= $config['base-path'] ?>/"><?= $config['bucket-name'] ?>/</a>
        </li>
        <? foreach (S3Browser::getBreadcrumb($dir) as $key => $name): ?>
        <? if ($key != '/'): ?>
        <li><a href="<?= $config['base-path'] ?>/<?= $name ?>"><?= $key ?>/</a></li>
        <? endif; ?>
        <? endforeach ?>
      </ul>
    </div>
  
    <? if (empty($files)): ?>
      <p>No files found.</p>
    <? else: ?>
    <ul>

    <? if (S3Browser::getParent($dir) !== null): ?>
      <li>
        <a href="<?= $config['base-path'] ?>/<?= S3Browser::getParent($dir) ?>">
          <img src="<?= $url->getSkinResource('/images/arrow_top.gif')?>">
          <span>..</span>
        </a>
      </li>
    <? endif; ?>
    <? foreach ($files as $key => $info): ?>
      <li>
        <? if (S3Browser::isFolder($info)): ?>
          <a href="<?= $config['base-path'] ?>/<?= $info['path'] ?>">
            <img src="<?= $url->getSkinResource('/images/folder.gif')?>">
            <span><?= $key ?></span>
          </a>
        <? else: ?>
           <a href="<?= $config['bucket-url-prefix'] ?>/<?= $info['path'] ?>">
          <img src="<?= $url->getSkinResource('/images/file.gif')?>">
          <span><?= $key ?></span>
        </a>
        <span class="size"><?= $info['hsize'] ?></span>
        <? endif; ?>
      </li>
    <? endforeach; ?>
    </ul>
    <? endif; ?>  
  </div>
  
  <div id="footer">
    <p><?php echo empty($config['footer-message']) ? "Browser" : $config['footer-message']?></p>
  </div>

</body>
</html>
