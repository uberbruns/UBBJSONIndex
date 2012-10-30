# Installation

Just create a directory and copy the autoindex.php and .htaccess into it.

## .htaccess
```
RewriteEngine On 
RewriteCond %{REQUEST_FILENAME} !-f 
RewriteRule ^(.*)$ autoindex.php [QSA,L]
```

## Response
```javascript
[{"uri":"\/UBBJSONIndex\/test\/file-a.txt","mime":"text\/plain","mtime":1351607764,"ctime":1351607764,"size":2},
{"uri":"\/UBBJSONIndex\/test\/file-b.html","mime":"text\/html","mtime":1351607784,"ctime":1351607784,"size":70}]
```
