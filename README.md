# SQL インジェクション体験ツール

## インストール方法

* 事前にネットワークインタフェースを確認（「ブリッジ」などに変更）して、インターネットに接続できるようにする必要があります
* これは事前に渡している環境用の説明です。環境によって若干異なる場合があります。

1. ホームディレクトリへ移動

```
$ cd ~
```

1. ソースコードをダウンロード（clone）

```
# wget https://github.com/ym405nm/sqlinjection-training/archive/master.zip
# unzip master.zip
```

1. ソースコードをDocumentRootディレクトリへ移動

```
# mv sqlinjection-training-master /var/www/html/
```

1.

```
# a2ensite 000-default
# service apache2 reload
```

1. ブラウザから http://(IPアドレス)/sqlinjection-training-master/install.php にアクセス→正常終了と出ればOK

※ IPアドレスが分からない場合は ifconfig コマンドで調べる
