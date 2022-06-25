import requests
import base64

token = "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZmQwN2ZiN2RhOTQxZWNiMGVhNTI3NDFhZWVhM2ViMjlkZTA4YzBmM2Y4MDJiY2UyNzM1MDM5Yzk1YzViY2Y5MjA4NGMwNmI3ZmYyZTkzNzEiLCJpYXQiOjE2NTYxMTUwOTkuNDkzNTY0LCJuYmYiOjE2NTYxMTUwOTkuNDkzNTY4LCJleHAiOjE2ODc2NTEwOTkuNDY4MTM2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.oUdyLhF697H2SrtBKmX7sMvYym_ZgXy7BxDWty7hkKihh5hWKJqVBP3NOgXBb2zbvVG_xafp5B9SImeoUZvheIzqvRnrpwg_apgdjLtJh3RyF9I3nCNKd4c1y1Y1i2hyd3YTB6ppiHcidVIm1oRgzPFt9rhk039dd4yu4ofw7bpC5RwCWncfD-IsCTXSdJ_r2eH3ryqTkszb4UKauAfjyenKPUBFge9F2IPtU0eocJMvSb6elqI1I5t41kzb6ERtiRvmLJlAP4aqxFZz183rb70o8pVpBAsKyPCLtj2TtVRxdAmbTKwMiZpBn1kvH-XU46YDohkmQz0o6pfndqX1eAOUmZhXYKyjVexrVWPTsT2eQEhuVjV5HryNpYmgcwoXMs76Xj1TVj8uZ-a_vqncLh9ejdl7EjV7Al41bDZwq4n-Z9m0e13eWyVumMYzmDtET-qw_Z658ftDQD1S3t47eL6XXzf61eS-58EkT_X0jZNN0zFMrVF1R6LXh0KBgykhVcU_Bp2lXl5Hqeaew69MfzKOgNBs0Bndt-aLLBEClL_7jtYX72DVx_MuT8wrue5jJ0DgCclPbn32s5Kj9JIoYM5XHENJeEgQco1SCcHm_T3WCmglEWNx1G5y7OZ45alQ-IiZKMhCt62qAiVD7bpKO6vo_uxOrTyDeM6bRI6mGoo"
host = "http://localhost:8000"

headers = {
    "Authorization" : token,
    "Accept" : "text/plain",
    "Content" : "application/json"
}

req = requests.get(host + "/api/analyzes/12", headers = headers)
# req = requests.post(host + "/api/analyzes", data = {"patient_id" : 1}, files = {'photo': open('test.jpg', 'rb')}, headers = headers)

print(req.text)

