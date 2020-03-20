#!/bin/bash
yarn build
cd build

sudo apt-get install -y lftp
#find . -type d \( -path "./.*" -o -path "./node_modules" \) -prune -o -name "*" -print -exec curl --ftp-create-dirs -T {} ftp://jata.com.br/public_html/{} --user $FTP_USER:$FTP_PASS \;

files=$(find * -type d \( -path "./.*" -o -path "./node_modules" \) -prune -o -name "*")
if [ ${#files[@]} -eq 0 ]; then
    echo "No files to update"
else

    for f in $files
	do
        echo "Enviando $f."
#        lftp -c "set net:timeout 5;
#         set ftp:ssl-allow no;
#         open ftp://$FTP_USER:$FTP_PASS@$FTP_HOST:21;
#         mirror -Re . /public_html/; 
#         quit;"

        curl --ftp-create-dirs -T {$f} ftp://jata.com.br/public_html/{$f} --user jatac390:G2B2G2B2H0W
        #curl --ftp-create-dirs -T {$f} ftp://jata.com.br/public_html/{$f} --user $FTP_USER:$FTP_PASS
        echo "$f enviado."
	done
fi