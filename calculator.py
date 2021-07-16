from flask import Flask

app = Flask(__name__)

@app.route("/api/discountCalculator/<yearAndFee>")
def process(yearAndFee=None):
    x = yearAndFee.split("|")
    year = float(x[0])
    fee = float(x[1])
    
    if year > 3 :
        discount = 1-0.3
    elif year > 2 :
        discount = 1-0.2
    elif year > 1 :
        discount = 1-0.1
    else :
        discount = 1
        
    
    return str(fee * discount)

if __name__ == "__main__":
    app.run(debug=True,
            host='127.0.0.1',
            port=8080)
