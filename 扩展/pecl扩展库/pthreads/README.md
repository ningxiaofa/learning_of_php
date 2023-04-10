-- Linux下安装 pthreads 扩展
要在 PHP 中安装 pthreads 扩展，您可以按照以下步骤操作：

1. 确认您已经安装了 pthread 库。如果您使用的是 Linux 操作系统，请运行以下命令来检查是否已安装该库：
dpkg -l | grep libpthread

2. 下载 pthreads 扩展代码。您可以从 Github 上的 pthreads 代码库下载最新版本的代码：
git clone https://github.com/krakjoe/pthreads.git

3. 进入 pthreads 目录并执行 phpize 命令。
cd pthreads
phpize

4. 配置 pthreads 扩展。
./configure --enable-pthreads

5. 执行 make 命令。
make

6. 执行 sudo make install 安装 pthreads 扩展。
sudo make install

7. 在 /etc/php/<your_php_version>/cli/conf.d 目录中创建一个名为 pthreads.ini 的文件，并在其中添加以下内容：
extension=pthreads.so
8. 重启 PHP-FPM 或 Web 服务器以使更改生效。
现在，您已经成功地在 PHP 中安装了 pthreads 扩展。


-- macOS 下安装 pthreads 扩展
要在 macOS 下安装 pthreads 扩展，您可以按照以下步骤操作：

1. 确认您已经安装了 pthread 库。macOS 自带了 pthread 库，所以无需额外安装。
   
2. 安装 Homebrew 包管理器。如果您还没有安装 Homebrew，请在终端中运行以下命令：
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

3. 使用 Homebrew 安装 PHP。在终端中运行以下命令：
brew install php

4. 使用 PECL 安装 pthreads 扩展。在终端中运行以下命令：
pecl install pthreads

5. 在 /usr/local/etc/php/<your_php_version>/conf.d 目录中创建一个名为 pthreads.ini 的文件，并在其中添加以下内容：
extension=pthreads.so

6. 重启 PHP-FPM 或 Web 服务器以使更改生效。
现在，您已经成功地在 macOS 中安装了 pthreads 扩展。

⚠️ windows下不支持！！

