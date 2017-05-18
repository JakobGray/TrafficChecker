'''Jakob Gray, getTime, 5/17/17
Accesses Google Maps' distance matrix API and gets the distance between two locations in real time.
This time is rounded to the upper minute and then written to a file.
Outpuf File: results.txt'''

import json
import urllib
import requests
import webbrowser
import math
import schedule
import time
import datetime
from pprint import pprint

def getTime():
    url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=%227417%20Gillingham%20Row,%20Alexandria,%20VA%22&destinations=%228280%20Greensboro%20Dr.%20Suite%20150%20McLean,%20VA%2022102%22&mode=driving&departure_time=now&units=imperial&traffic_model=best_guess&key=AIzaSyC6VQsM92hCnlnymLJjOZglCKOJ-NmEg_c";

    response = urllib.request.urlopen(url)
    data = json.loads(response.read().decode('utf-8'))
    traveltime = data['rows'][0]['elements'][0]['duration_in_traffic']['value']
    return (math.ceil(traveltime/60))

target = open("/home/jakob/Projects/Googlemaps/results.txt","a+")
minTime = str(getTime());
target.write(minTime + " " + str(datetime.datetime.now().time()) + "\n")
target.close()
