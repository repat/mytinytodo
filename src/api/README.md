mytinytodo API
======
I plan and already started writing a simple JSON-API forlLists and items for myTinyTodo. It's very very alpha, don't use it yet. Contributions welcome!

### For Debugging only
#### /api/getMD5pw
If there is a password set in `db/config.php.default`, it will be displayed as a [MD5-Hash](https://en.wikipedia.org/wiki/MD5 "MD5 on wikipedia").

Example(MD5 for 'password'):
 `{"md5pw":"5f4dcc3b5aa765d61d8327deb882cf99"}`

#### /api/getSHA1pw
If there is a password set in `db/config.php.default`, it will be displayed as a [SHA-1-Hash](https://en.wikipedia.org/wiki/SHA-1 "SHA-1 on wikipedia").

Example(SHA-1 for 'password'):
 `{"sha1pw":"5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8"}`

### Getters

#### /api/getTitles
Returns all entries of specified list(`$listname`) and numbers them with an index. I'm gonna rewrite this.

Parameters:
* listname
* optional: md5pw (see above)
* optional: sha1pw (see above)

Example:
`{"title0":"testentry"}`

#### /api/getTitles
Returns the lists and numbers both id and name with an index.I'm gonna rewrite this.

Parameters:
* optional: md5pw (see above)
* optional: sha1pw (see above)

Example:
`{"id0":"1","name0":"Todo"}`

### Setters
-

### Contact
* http://repat.de
* email: repat[at]repat[dot]de
* XMPP: repat@jabber.ccc.de
* Twitter: [repat123](https://twitter.com/repat123 "repat123 on twitter")
* Languages: German, English, French

### Copyright
* as the original: [GNU GPL v3](http://opensource.org/licenses/GPL-3.0 "GPL 3.0 on opensource.org")
