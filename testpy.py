#!/usr/bin/env python
# -*- coding: UTF-8 -*-

from tests import LiveLog  
import json, urllib, urllib2

ll = LiveLog.LiveLog("test.py", "5b2124dacd65996bddd0bb6b332b0258")

testdata = "ohhh yeaaaah"
ll.postToServer(testdata)

#testing connections. open the url (LiveLogCatch), then print the first 100 lines
f = urllib2.urlopen('http://localhost/LiveLog/front_end/LiveLogCatch.php')
print f.read(100)