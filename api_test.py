import time
import requests


URI = 'http://localhost:1233/api/posts'

headers = {
'Accept' : 'application/json',
'Authorization' : 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiMTRhNmM2NjViZjI0YzU5OGFmNjE2YTBlMjIwNDA5MzQ2NWFhMThmNDE3YThmZTc2ZTdlM2ZhN2ViNTQ5NGMyMjMxYTQ5OTg1YjZiOWU2OTkiLCJpYXQiOjE2NjA2NDQ5ODMuMTIwODUzLCJuYmYiOjE2NjA2NDQ5ODMuMTIwODU2LCJleHAiOjE2OTIxODA5ODMuMDU1MjM1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.IBVQVLdI50wMbtyQo4a1pT9ZPUZ2OFs5GlM_yCv_YydVRCthSktADGBAaQYaY_uQAcWN1B0uhWPovC7jO5ITCSxEXHjzNUf4eHYSHEvrKmz2vctjolcaCeLZ4Avk7dRo_j-YSsAfatVoX3csuMfeHKziBBUfB2sCqTg_JohvfYY_bgnB6noxTHZ9usHLiqPTTChLajJF75MdMVseLbJVN6W5jMZJ41-BAX7IBt0x-z2qrezLO4FB8y9w-clQ0wDPq68Eg0haJ-WJeW-B4QFdyZIRxzMTi5mL61meWpkERKoYXkRCzdIbndQI6j_UAY7_quAlbYPhaeWHyu0AURH0nor1XzP9VPBaKrWivpGb3qiTkHtL9cHnVa1zLgyovjxabu8pMWr-uEyWkhoeZEikQY8ie_gMG45sg2lM-0qmxIT58WiHYYtMpNm4T-krevCuq3LQsUoQHVB6uPrNqRnFxjtI_m-jZeLwOpUuyzSFR8p3Z-iO633SQnG9_Uz_tgE9olh72bYXQnmh4zrTl_SO-3PL6dnRxSRM6dMpoQMsSuLRt1oFuKTieStNrMqY4LXsnXeDu2_yMFqhMN_9PwJxTyzr_-TAdrvxqNkdJnMZNOXL6hcdItVO6LEZxsB47GGb6q1Nh-pR82QV-Pxe0IViARR_E7b9_KDjZRXEUtLeyXM'
}

for i in range(0, 2000):
    content = {
        'title' : 'abcd' + str(i),
        'text' : 'abcd' + str(i),
    }
    res = requests.post(URI, headers = headers, json = content)
    print(res.status_code)

# posts = requests.get(URI, headers=headers).json()

# for post in posts:
#     response = requests.delete(URI + '/' + str(post['id']), headers=headers)
#     print(response.status_code)