import csv
from scapy.all import * #Network libraly

def get_mac(ip_address): # Get MacAddress fanction
    responses, unanswered = srp(Ether(dst="ff:ff:ff:ff:ff:ff")/ARP(pdst=ip_address), timeout=2, retry=1)
    for s, r in responses:
        return r[Ether].src

maclist = []

for i in range(1, 256):
    privateip = "192.168.0." + str(i) #PrivateIP 192.168.0.1 ~ 192.168.0.255
    res = get_mac(privateip)

    if res is not "None" or "": 
        maclist.append(res)
    
    print(res)

f = open('MacDataTable1.csv','w')

writer = csv.writer(f, lineterminator='\n')
writer.writerows(maclist)

f.close()
