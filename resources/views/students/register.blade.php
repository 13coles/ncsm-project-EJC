<x-alertmessage></x-alertmessage>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Registration form</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="/images/nolitc.png">
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
  }

  header{
    display: flex;
    justify-content: space-between;
    padding: 1% 6%;
    box-shadow: 0px 0px 32px -2px rgba(136,136,136,1);
    -webkit-box-shadow: 0px 0px 32px -2px rgba(136,136,136,1);
    -moz-box-shadow: 0px 0px 32px -2px rgba(136,136,136,1);
    position: fixed;
    width: 100%;
    z-index: 1;
    background-color: white;
  }

  header > .header-text-image{
    display: flex;
    align-items: center;
    gap: 0 30px;
    width: 34%;
  }
  .header-text-image > h2{
    color: #168753;
    line-height: 30px;
  }
  ul{
    display: flex;
    list-style: none;
    gap: 0 30px;
    align-items: center;
  }
  ul > li{
    color: #403F91;
    font-weight: 600;
  }
/* content */
.background{
    background-color: hsla(152, 72%, 31%, 1);
    opacity: 80%;
    padding: 1px 6%;
    top: 128px;
    position: absolute;
    height: 90px;
    width: 100%;
}
h2{
    color:  hsla(84, 42%, 95%, 1);
    opacity: 80%;
    font-size: 30px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 100px;
}
h1{
    color: hsla(152, 72%, 31%, 1);
    position: absolute;
    top: 220px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    font-size: 50px;
    left: 110px;
}
u{
    text-decoration: underline;
    text-decoration-color: hsla(241, 39%, 41%, 1);
    width: 100%;
}
h3{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 340px;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}
h5{
    color:
    hsla(152, 72%, 31%, 1);
    position: absolute;
    top: 390px;
    left: 130px;
    font-size: 15px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    font-weight: 400;
}
.course{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 420px;
    left: 110px;
    font-size: 20px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 20%;
    padding-left: 15px;
}
select:focus {
    outline: none;
}
.profile{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 500px;
    font-size: 22px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}
h4{
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    font-size: 18px;
    color: hsla(0, 0%, 22%, 1);
    opacity: 80%;
    position: absolute;
    top: 550px;
    left: 110px
}
.suff{
    position: absolute;
    top: 67%;
    left: 61%;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    color: hsla(152, 72%, 31%, 1);
    font-size: 13px;
}
.last{
    position: absolute;
    top: 61%;
    left: 6.9%;
}
.lastname{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 64%;
    left: 112px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}

.first{
    position: absolute;
    top: 61%;
    left: 460px;
}
.firstname{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 64%;
    left: 440px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.middle{
    position: absolute;
    top: 61%;
    left: 790px;
}
.middlename{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 64%;
    left: 770px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.suffix{
    position: absolute;
    top: 61%;
    left: 1130px
}
.suf{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 64%;
    left: 1110px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}

input:focus{
outline: none;
}
.complete{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 75%;
    font-size: 22px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}
/* address */
.street{
    position: absolute;
    top: 80%;
    left: 6.9%;
}
.region{
    position: absolute;
    top: 80%;
    left: 560px;
}
.prov{
    position: absolute;
    top: 80%;
    left: 1090px;
}
.city{
    position: absolute;
    top: 93%;
    left: 131px;
}
.district{
    position: absolute;
    top: 93%;
    left: 550px;
}
.code{
    position: absolute;
    top: 93%;
    left: 930px
}
.nationality{
    position: absolute;
    top: 93%;
    left: 1190px;
}
.num{
    position: absolute;
    top: 61%;
    left: 1130px;
}
.mail{
    position: absolute;
    top: 61%;
    left: 1130px;
}

/* input type address */
.number{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 83.4%;
    left: 112px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.reg{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top:83.4%;
    left: 28.1%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 20%;
    padding-left: 15px;
}
.registered{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 83.4%;
    left: 55.8%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 20%;
    padding-left: 15px;
}
.muni{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 97%;
    left: 5.5%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 17%;
    padding-left: 15px;
}
.dist{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 97%;
    left: 27.5%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 17%;
    padding-left: 15px;
}
.Zip{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 97%;
    left: 47.5%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 10%;
    padding-left: 15px;
}
.country{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 97%;
    left: 61%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 10%;
    padding-left: 15px;
}
.num{
    position: absolute;
    top: 106%;
    left: 131px;
}
.tel{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 109%;
    left: 6%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 13%;
    padding-left: 15px;
}
.mail{
    position: absolute;
    top: 106%;
    left: 550px;
}
.email{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 109%;
    left: 28%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 13%;
    padding-left: 15px;
}
.info{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 120%;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}
.sex{
    position: absolute;
    top: 125%;
    left: 131px;
}
.gender{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 128%;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 128px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    opacity: 80;
    padding-top: 10px;
}
.male{
    position: absolute;
    top: 17%;
    left: 0;
}
label[for=male]{
    position: absolute;
    top: 10%;
    left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}

.female{
    position: absolute;
    top: 105%;
    left: 0;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
label[for=female]{
    position: absolute;
    top: 95%;
    left: 20px;
}

.civil{
    position: absolute;
    top: 125%;
    left: 21%;
}
.status{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 128%;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 128px;
    opacity: 80;
}
.single{
    position: absolute;
    top: 10%;
    left: 280px;
}
label[for=single]{
    position: absolute;
    left: 300px;
    top: 6%;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.widow{
    position: absolute;
    top: 11%;
    left: 410px
}
label[for=widow]{
    position: absolute;
    left: 430px;
    top: 6%;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.solo{
    position: absolute;
    top: 12%;
    left: 570px;
}
label[for=solo]{
    position: absolute;
    top: 8%;
    left: 600px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.married{
    position: absolute;
    top: 50%;
    left: 280px;
}
label[for=married]{
    position: absolute;
    top: 45%;
    left: 300px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.sep{
    position: absolute;
    top: 50%;
    left: 410px;
}
label[for=sep]{
    position: absolute;
    top: 45%;
    left: 430px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.employ{
    position: absolute;
    top: 125%;
    left: 52%;
}
.employment{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 128%;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 128px;
    opacity: 80;
}
.employed{
    position: absolute;
    top: 32%;
    left: 860px;
}
label[for=employed]{
    position: absolute;
    top: 22%;
    left: 890px;
}
.unemployed{
    position: absolute;
    top: 55px;
    left: 860px;
}
label[for=unemployed]{
    position: absolute;
    top: 120%;
    left: 890px;
}
.birth{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 141%;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}
.date{
    position: absolute;
    top: 146%;
    left: 130px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
input[type=date]{
    position: absolute;
    top: 149%;
    font-size: 17px;
    left: 130px;
    border: none;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.letter{
    position: absolute;
    top: 153%;
    left: 130px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.place{
    top: 160%;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}
.region1{
    position: absolute;
    top: 167%;
    left: 130px;
}
.prov1{
    position: absolute;
    top: 167%;
    left: 27%;
}
.city1{
    position: absolute;
    top: 167%;
    left: 48%;
}

.region2{
    position: absolute;
    top: 166%;
    left: 135px;
}
.prov2{
    position: absolute;
    top: 166%;
    left: 510px;
}
.city2{
    position: absolute;
    top: 166%;
    left: 910px;
}

.gion{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top:170%;
    left: 6.2%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 16%;
    padding-left: 15px;
}
.vince{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 170%;
    left: 25.7%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 17%;
    padding-left: 15px;
}
.lity{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 170%;
    left: 47%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 18%;
    padding-left: 15px;
}
.train{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 179%;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}
.education{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 185%;
    font-size: 18px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 128px;
    opacity: 80;
}

.parent{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 120%;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: -18px;
    opacity: 80%;
}

.suff1{
    position: absolute;
    top: 215%;
    left: 92%;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    color: hsla(152, 72%, 31%, 1);
    font-size: 13px;
    width: 45%;
}
.last1{
    position: absolute;
    top: 165%;
    left: 0;
}
.lastname1{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 190%;
    left: -20px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}

.first1{
    position: absolute;
    top: 165%;
    left: 30%;
    width: 100px;
}
.firstname1{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 190%;
    left: 362px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.middle1{
    position: absolute;
    top: 165%;
    left: 790px;
    width: 60px;
}
.middlename1{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 190%;
    left: 770px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.suffix1{
    position: absolute;
    top: 165%;
    left: 1130px;
    width: 40%;
}
.suf1{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 190%;
    left: 1110px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.contact{
    position: absolute;
    top: 222%;
    left: 131px;
}
.numb{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 225.5%;
    left: 112px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.ling{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 235%;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}

.street1{
    position: absolute;
    top: 242%;
    left: 6.9%;
}
.region1{
    position: absolute;
    top: 242%;
    left: 560px;
}
.prov1{
    position: absolute;
    top: 242%;
    left: 1090px;
}
.city1{
    position: absolute;
    top: 255%;
    left: 125px;
}
.district1{
    position: absolute;
    top: 255%;
    left: 550px;
}
.code1{
    position: absolute;
    top: 255%;
    left: 930px
}
.ber{
    position: absolute;
    top: 255%;
    left: 64%;
}

.number1{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 246%;
    left: 112px;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}
.reg1{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top:246%;
    left: 28.5%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 20%;
    padding-left: 15px;
}
.registered1{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 246%;
    left: 56.3%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 20%;
    padding-left: 15px;
}
.muni1{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 259%;
    left: 5.5%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 17%;
    padding-left: 15px;
}
.dist1{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 259%;
    left: 27.8%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 17%;
    padding-left: 15px;
}
.Zip1{
    position: absolute;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    top: 259%;
    left: 47.8%;
    font-size: 18px;
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    width: 10%;
    padding-left: 15px;
}
.numb1{
    border: none;
    border-bottom: 2px solid hsla(152, 72%, 31%, 1);
    font-size: 17px;
    position: absolute;
    top: 259.3%;
    left: 63%;
    padding-left: 20px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
}

.trainee{
    position: absolute;
    color: hsla(0, 0%, 22%, 1);
    top: 268%;
    font-size: 24px;
    font-family: "Inter", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    left: 110px;
    opacity: 80%;
}

.container{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    position: absolute;
    top: 275%;
    left: 130px;
}
.item{
    display: flex;
    align-items: center;
}
input[type=checkbox]{
    margin-right: 20px;
}
.education{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    position: absolute;
    top: 187%;
    left: 130px;
}
.item{
    display: flex;
    align-items: center;
}
input[type=readio]{
    margin-right: 20px;
}

.submit{
    background-color: green;
    color: white;
    font-weight: bolder ;
    position: absolute;
    top: 120%;
    left: 43%;
    width: 10%;
    height: 10%;
    font-size: 23px;
    border: none;
    border-radius: 5px;
}
.footer{
    display: flex;
    justify-content: space-between;
    padding: 1% 6%;
    position: absolute;
    width: 121.1%;
    z-index: 1;
    background-color: rgb(29, 110, 33);
    top: 140%;
    left: -150px;
    height: 40%;
}
.republic{
    font-size: 15px;
    color: white;
    position: absolute;
    top: 20px;
    left: 20%;
}
.content{
    color: white;
    position: absolute;
    top: 45px;
    left: 20%;
    font-size: 11px;
    font-weight: lighter;
}

.about{
    font-size: 15px;
    color: white;
    position: absolute;
    top: 20px;
    left: 45%;
}
.learn{
    color: white;
    position: absolute;
    top: 45px;
    left: 45%;
    font-size: 11px;
    font-weight: lighter;
}
.gov{
    position: absolute;
}
    </style>
</head>
<body>
    {{-- <header class="header-container">
        <div class="header-text-image">
          <div class="header-image">
            <img src="/images/nolitc.png" alt="logo">
          </div>
          <h2>NEGROS OCCIDENTAL LANGUAGE AND INFORMATION TECHNOLOGY CENTER</h2>
        </div>
        <ul class="header-text-list">
          <li><a href="">Home</a></li>
          <li>Programs</li>
          <li>Update</li>
          <li>About Us</li>
          <li>Contact Us</li>
        </ul>
      </header> --}}

      <div class="background">
        <h2>REGISTRATION FORM</h2>
    </div>
    <h1><u>LEARNERS PROFILE FORM</u></h1>
    <div class="title">
        <h3>Preferred Qualification</h3>
        <h5>Qualification *</h5>
    </div>

    <form action="{{ route('register_student') }}" method="POST">
        <form>
        @csrf
        <select id="course" name="course" class="course">
          <option value="Visual Graphic Design NCIII" selected>Visual Graphic Design NCIII</option>
          <option value="Contact Center Services NC II">Contact Center Services NC II</option>
          <option value="Animation NC II">Animation NC II</option>
          <option value="2D Animation NC III">2D Animation NC III</option>
        </select>

        <div class="learner">
            <h3 class="profile">Learner Profile/Manpower Profile</h3>
        </div>

        <h4>Full Name</h4>
        <div class="forms">
        <h5 class="last">Last Name *</h5>
        <h5 class="first">First Name *</h5>
        <h5 class="middle">Middle *</h5>
        <h5 class="suffix">Suffix *</h5>
        <h5 class="suff">(e.g Jr., Sr., III, if any)</h5>
    </div>

    <input class="lastname" type="text" placeholder="Lastname" name="lname" required>
    <input class="firstname" type="text" placeholder="Firstname" name="fname" required>
    <input class="middlename" type="text" placeholder="Middlename" name="mname" required>
    <input class="suf" type="text" placeholder="Suffix" name="sname">

    <h3 class="complete">Complete Permanent Mailing Address</h3>

    <h5 class="street">Number,Street *</h5>
    <h5 class="region">Region *</h5>
    <h5 class="prov">Province *</h5>
    <h5 class="city">City/Municipality *</h5>
    <h5 class="district">District *</h5>
    <h5 class="code">Zip Code</h5>
    <h5 class="nationality">Nationality *</h5>
    <h5 class="num">Contact Number</h5>
    <h5 class="mail">Email Address*</h5>
    <h5 class="sex">Sex</h5>
    <h5 class="civil">Civil Status</h5>
    <h5 class="employ">Employment Status (before the training)</h5>
    <h5 class="date">Date</h5>
    <h5 class="letter">MM/DD/YYYY</h5>
    <h5 class="region1">Region *</h5>
    <h5 class="prov1">Province *</h5>
    <h5 class="city1">City/Municipality *</h5>
    <h5 class="contact">Contact Number</h5>
    <h5 class="ber">Contact Number</h5>

    <input class="number" type="text" placeholder="Number, Street" name="student_numberStreet" required>

    <select id="region" name="region" class="reg" disabled>
        <option value="western visayas" selected>VI</option>
    </select>

    <select id="province" name="province" class="registered" disabled>
      <option value="Negros Occidental" selected>Negros Occidental</option>
    </select>

    <select id="muni" name="muni" class="muni" required>
      <option value="" selected disabled>Select City/Municapility</option>
      <option value="Bago City">Bago City</option> <option value="Binalbagan">Binalbagan</option>
      <option value="Candoni">Candoni</option> <option value="Cauayan">Cauayan</option>
      <option value="Don Salvador Benedicto">Don Salvador Benedicto</option> <option value="Enrique B. Magalona">Enrique B. Magalona</option>
      <option value="Escalante City">Escalante City</option> <option value="Himamaylan City">Himamaylan City</option>
      <option value="Hinigaran">Hinigaran</option> <option value="Hinoba-an">Hinoba-an</option>
      <option value="Ilog">Ilog</option> <option value="Isabela">Isabela</option>
      <option value="Kabankalan">Kabankalan</option> <option value="La Carlota City">La Carlota City</option>
      <option value="La Castellana">La Castellana</option> <option value="Manapla">Manapla</option>
      <option value="Moises Padilla">Moises Padilla</option> <option value="Murcia">Murcia</option>
      <option value="Pontevedra">Pontevedra</option> <option value="Pulupandan">Pulupandan</option>
      <option value="Sagay City">Sagay City</option> <option value="San Carlos City">San Carlos City</option>
      <option value="San Enrique">San Enrique</option> <option value="Silay City">Silay City</option>
      <option value="Sipalay">Sipalay</option> <option value="Talisay City">Talisay City</option>
      <option value="Toboso">Toboso</option> <option value="Valladolid">Valladolid</option>
      <option value="Victorias City">Victorias City</option>
    </select>

    <select id="dist" name="dist" class="dist">
      <option value="none" selected id="selected_zip">Select District</option>
    </select>

    <select  name="zip" class="Zip" >
      <option value="none" id="Zip" selected>Zip Code</option>
    </select>

    <select id="country" name="country" class="country" required>
      <option value="" disabled selected>Select Nationality</option>
      <option value="Chinese">Chinese</option> <option value="">Japanese</option>
      <option value="Korean">Korean</option> <option value="">Indian</option>
      <option value="Pakistani">Pakistani</option> <option value="">Bangladeshi</option>
      <option value="Filipino">Filipino</option>
    </select>

    <input class="tel" type="number" placeholder="cellphone number" minlength="11" maxlength="11" required>
    <input class="email" type="email" placeholder="email" name="student_email" required>

    <h3 class="info">Personal Information</h3>

    <div class="gender">
      <input type="radio" id="male" name="gender" value="male" class="male" required>
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="gender" value="female" class="female">
      <label for="female">Female</label><br>
    </div>

    <div class="status">
      <input type="radio" id="single" name="civil_status" value="Single" class="single" required>
      <label for="single">Single</label><br>

      <input type="radio" id="widow" name="civil_status" value="widow/er" class="widow">
      <label for="widow">Widow/er</label><br>

      <input type="radio" id="elementary graduate" name="civil_status" value="SoloParent" class="solo">
      <label for="solo">SoloParent</label><br>

      <input type="radio" id="married" name="civil_status" value="married" class="married">
      <label for="married">Married</label><br>

      <input type="radio" id="seperated" name="civil_status" value="seperated" class="sep">
      <label for="sep">Seperated</label><br>
    </div>

    <div class="employment">
      <input type="radio" id="employed" name="employment" value="employed" class="employed" required>
      <label for="employed">Employed</label><br>

      <input type="radio" id="unemployed" name="employment" value="unemployed" class="unemployed">
      <label for="unemployed">Unemployed</label><br>
    </div>

    <h3 class="birth">Birthdate</h3>
    <input type="date" placeholder="date" name="birthdate" required>

    <h3 class="place">Birthplace</h3>

    <select id="gion" name="gion" class="gion" disabled>
      <option value="western visayas" selected>VI</option>
  </select>

  <select id="vince" name="vince" class="vince" disabled>
    <option value="Negros Occidental" selected>Negros Occidental</option>
  </select>

  <select id="lity" name="municapility" class="lity" required>
    <option value="" selected disabled>Select City/Municapility</option>
    <option value="Bago City">Bago City</option> <option value="Binalbagan">Binalbagan</option>
    <option value="Candoni">Candoni</option> <option value="Cauayan">Cauayan</option>
    <option value="Don Salvador Benedicto">Don Salvador Benedicto</option> <option value="Enrique B. Magalona">Enrique B. Magalona</option>
    <option value="Escalante City">Escalante City</option> <option value="Himamaylan City">Himamaylan City</option>
    <option value="Hinigaran">Hinigaran</option> <option value="Hinoba-an">Hinoba-an</option>
    <option value="Ilog">Ilog</option> <option value="Isabela">Isabela</option>
    <option value="Kabankalan">Kabankalan</option> <option value="La Carlota City">La Carlota City</option>
    <option value="La Castellana">La Castellana</option> <option value="Manapla">Manapla</option>
    <option value="Moises Padilla">Moises Padilla</option> <option value="Murcia">Murcia</option>
    <option value="Pontevedra">Pontevedra</option> <option value="Pulupandan">Pulupandan</option>
    <option value="Sagay City">Sagay City</option> <option value="San Carlos City">San Carlos City</option>
    <option value="San Enrique">San Enrique</option> <option value="Silay City">Silay City</option>
    <option value="Sipalay">Sipalay</option> <option value="Talisay City">Talisay City</option>
    <option value="Toboso">Toboso</option> <option value="Valladolid">Valladolid</option>
    <option value="Victorias City">Victorias City</option>
  </select>

  <h3 class="train">Educational Attainment Before the Training (Trainee)</h3>

  <div class="education">
      <div class="item1">
      <input type="radio" id="22" name="education" value="No Grade Complete">
      <label for="AG-Wahl">No Grade Complete</label>
      </div>
      <div class="item1">
      <input type="radio" id="23" name="education" value="Elementary Undergraduate">
      <label for="AG-Wahl">Elementary Undergraduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="24" name="education" value="Elementary Graduate">
      <label for="AG-Wahl">Elementary Graduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="25" name="education" value="Pre-School (Nursery/Kinder/Prep)">
      <label for="AG-Wahl">Pre-School (Nursery/Kinder/Prep)</label>
      </div>
      <div class="item1">
      <input type="radio" id="26" name="education" value="Post Secondary Undergraduate">
      <label for="AG-Wahl">Post Secondary Undergraduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="27" name=education" value="Post Secondary Graduate">
      <label for="AG-Wahl">Post Secondary Graduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="28" name="education" value="High School Under Graduate">
      <label for="AG-Wahl">High School Under Graduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="29" name="education" value="College Undergraduate">
      <label for="AG-Wahl">College Undergraduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="30" name="education" value="Junior High Graduate">
      <label for="AG-Wahl">Junior High Graduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="31" name="education" value="High School Graduate">
      <label for="AG-Wahl">High School Graduate</label>
      </div>
      <div class="item1">
      <input type="radio" id="32" name="education" value="College Graduate or Higher">
      <label for="AG-Wahl">College Graduate or Higher</label>
      </div>
      <div class="item1">
      <input type="radio" id="33" name="education" value="Senior High Graduate">
      <label for="AG-Wahl">Senior High Graduate</label>
      </div>

      <h3 class="parent">Parent/Guardian</h3>

      <div class="guardian">
        <h5 class="last1">Last Name *</h5>
        <h5 class="first1">First Name *</h5>
        <h5 class="middle1">Middle *</h5>
        <h5 class="suffix1">Suffix *</h5>
        <h5 class="suff1">(e.g Jr., Sr., III, if any)</h5>

        <input class="lastname1" type="text" placeholder="Lastname" name="plname" required>
        <input class="firstname1" type="text" placeholder="Firstname" name="pfname" required>
        <input class="middlename1" type="text" placeholder="Middlename" name="pmname" required>
        <input class="suf1" type="text" placeholder="Suffix" name="psname" required>
      </div>

  </div>

    <input class="numb" type="number" placeholder="cellphone number" name="pcellphone_number" required>

    <h3 class="ling">Complete Permanent Mailing Address</h3>

    <h5 class="street1">Number,Street *</h5>
    <h5 class="region1">Region *</h5>
    <h5 class="prov1">Province *</h5>
    <h5 class="city1">City/Municipality *</h5>
    <h5 class="district1">District *</h5>
    <h5 class="code1">Zip Code</h5>

    <h5 class="region2">Region *</h5>
    <h5 class="prov2">Province *</h5>
    <h5 class="city2">City/Municipality *</h5>

    <input class="number1" type="text" placeholder="Number, Street" name="number_street" required>

    <select id="region" name="region" class="reg1" disabled>
        <option value="western visayas" selected>VI</option>
    </select>

    <select id="province" name="province" class="registered1" disabled>
      <option value="Negros Occidental" selected>Negros Occidental</option>
    </select>

    <select id="pmuni" name="pmuni" class="muni1" required>
      <option value="" selected disabled>Select City/Municapility</option>
      <option value="Bago City">Bago City</option> <option value="Binalbagan">Binalbagan</option>
      <option value="Candoni">Candoni</option> <option value="Cauayan">Cauayan</option>
      <option value="Don Salvador Benedicto">Don Salvador Benedicto</option> <option value="Enrique B. Magalona">Enrique B. Magalona</option>
      <option value="Escalante City">Escalante City</option> <option value="Himamaylan City">Himamaylan City</option>
      <option value="Hinigaran">Hinigaran</option> <option value="Hinoba-an">Hinoba-an</option>
      <option value="Ilog">Ilog</option> <option value="Isabela">Isabela</option>
      <option value="Kabankalan">Kabankalan</option> <option value="La Carlota City">La Carlota City</option>
      <option value="La Castellana">La Castellana</option> <option value="Manapla">Manapla</option>
      <option value="Moises Padilla">Moises Padilla</option> <option value="Murcia">Murcia</option>
      <option value="Pontevedra">Pontevedra</option> <option value="Pulupandan">Pulupandan</option>
      <option value="Sagay City">Sagay City</option> <option value="San Carlos City">San Carlos City</option>
      <option value="San Enrique">San Enrique</option> <option value="Silay City">Silay City</option>
      <option value="Sipalay">Sipalay</option> <option value="Talisay City">Talisay City</option>
      <option value="Toboso">Toboso</option> <option value="Valladolid">Valladolid</option>
      <option value="Victorias City">Victorias City</option>
    </select>

    <select  name="pdist" class="dist1">
      <option value="none" selected id="pselected_zip">Select District</option>
    </select>

    <select  name="Zip" class="Zip1" required>
      <option value="none" id="pZip" selected>Zip Code</option>
    </select>

    <input class="numb1" type="number" placeholder="cellphone number" name="student_contactNumber" required>


    <h3 class="trainee">Learner/Trainee/Student(Clients)Classification</h3>

    <div class="container">
      <div class="item">
          <input type="checkbox" id="1" name="classification[]" value="Students">
          <label for="AG-Wahl">Students</label>
      </div>
      <div class="item">
          <input type="checkbox" id="2" name="classification[]" value="Informal Workers">
          <label for="AG-Wahl">Informal Workers</label>
      </div>
      <div class="item">
          <input type="checkbox" id="3" name="classification[]" value="Indigenous People & Cultural Communities">
          <label for="AG-Wahl">Indigenous People & Cultural Communities</label>
      </div>
      <div class="item">
          <input type="checkbox" id="4" name="classification[]" value="Out-of-School-Youth">
          <label for="AG-Wahl">Out-of-School-Youth</label>
      </div>
      <div class="item">
          <input type="checkbox" id="5" name="classification[]" value="Industry Workers">
          <label for="AG-Wahl">Industry Workers</label>
      </div>
      <div class="item">
          <input type="checkbox" id="6" name="classification[]" value="Disadvantage Woman">
          <label for="AG-Wahl">Disadvantage Woman</label>
      </div>
      <div class="item">
        <input type="checkbox" id="7" name="classification[]" value="Solo Parent">
        <label for="AG-Wahl">Solo Parent</label>
    </div>
    <div class="item">
      <input type="checkbox" id="8" name=classification[]" value="Cooperatives">
      <label for="AG-Wahl">Cooperatives</label>
  </div>
  <div class="item">
    <input type="checkbox" id="9" name="classification[]" value="Victim Of Natural Disasters and Calamities">
    <label for="AG-Wahl">Victim Of Natural Disasters and Calamities</label>
</div>
<div class="item">
  <input type="checkbox" id="10" name="classification[]" value="Solo Parent's Children">
  <label for="AG-Wahl">Solo Parent's Children</label>
</div>
<div class="item">
<input type="checkbox" id="11" name="classification[]" value="Family Enterprises">
<label for="AG-Wahl">Family Enterprises</label>
</div>
<div class="item">
<input type="checkbox" id="12" name="classification[]" value="Victim of Survivor of Human Trafficking">
<label for="AG-Wahl">Victim of Survivor of Human Trafficking</label>
</div>
<div class="item">
<input type="checkbox" id="13" name="classification[]" value="Senior Citizens">
<label for="AG-Wahl">Senior Citizens</label>
</div>
<div class="item">
<input type="checkbox" id="14" name="classification[]" value="Micro Entrepreneurs">
<label for="AG-Wahl">Micro Entrepreneurs</label>
</div>
<div class="item">
<input type="checkbox" id="6" name="classification[]" value="Drug Dependent Surrenders">
<label for="AG-Wahl">Drug Dependent Surrenders</label>
</div>
<div class="item">
<input type="checkbox" id="15" name="classification[]" value="Displaced HEIs Teaching Personnel">
<label for="AG-Wahl">Displaced HEIs Teaching Personnel</label>
</div>
<div class="item">
<input type="checkbox" id="16" name="classification[]" value="Family Member of Microentrepreneurs">
<label for="AG-Wahl">Family Member of Microentrepreneurs</label>
</div>
<div class="item">
<input type="checkbox" id="17" name="classification[]" value="Rebel Returnees or Decommisioned Combatants">
<label for="AG-Wahl">Rebel Returnees or Decommisioned Combatants</label>
</div>
<div class="item">
<input type="checkbox" id="18" name="classification[]" value="Displaced Workers">
<label for="AG-Wahl">Displaced Workers</label>
</div>
<div class="item">
<input type="checkbox" id="19" name="classification[]" value="Farmers and Fisherman">
<label for="AG-Wahl">Farmers and Fisherman</label>
</div>
<div class="item">
<input type="checkbox" id="20" name="classification[]" value="Inmates and Detainees">
<label for="AG-Wahl">Inmates and Detainees</label>
</div>
<div class="item">
<input type="checkbox" id="21" name="classification[]" value="TVET Trainers">
<label for="AG-Wahl">TVET Trainers</label>
</div>
<div class="item">
<input type="checkbox" id="22" name="classification[]" value="Family Members of Farmers and Fisherman">
<label for="AG-Wahl">Family Members of Farmers and Fisherman</label>
</div>
<div class="item">
<input type="checkbox" id="23" name="classification[]" value="Wounded-in-Action AFP and PNP Personnel">
<label for="AG-Wahl">Wounded-in-Action AFP and PNP Personnel</label>
</div>
<div class="item">
<input type="checkbox" id="24" name="classification[]" value="Currently Employed Workers">
<label for="AG-Wahl">Currently Employed Workers</label>
</div>
<div class="item">
<input type="checkbox" id="25" name="classification[]" value="Community Trng. & Employment Coordinator">
<label for="AG-Wahl">Community Trng. & Employment Coordinator</label>
</div>
<div class="item">
<input type="checkbox" id="26" name="classification[]" value="Family Members of AFP and PNP killed-and-Wounded-in-Action">
<label for="AG-Wahl">Family Members of AFP and PNP killed-and-Wounded-in-Action</label>
</div>
<div class="item">
<input type="checkbox" id="27" name="classification[]" value="Employee with Contractual/Job Order Status">
<label for="AG-Wahl">Employee with Contractual/Job Order Status</label>
</div>
<div class="item">
<input type="checkbox" id="28" name="classification[]" value="Returning/Repatriated Overseas Filipino Workers">
<label for="AG-Wahl">Returning/Repatriated Overseas Filipino Workers</label>
</div>
<div class="item">
<input type="checkbox" id="29" name="classification[]" value="Family Members of Inmates and Detainees">
<label for="AG-Wahl">Family Members of Inmates and Detainees</label>
</div>
<div class="item">
<input type="checkbox" id="30" name="classification[]" value="TESDA Alumni">
<label for="AG-Wahl">TESDA Alumni</label>
</div>
<div class="item">
<input type="checkbox" id="31" name="classification[]" value="Overseas Filipino Workers (OFW) Dependents">
<label for="AG-Wahl">Overseas Filipino Workers (OFW) Dependents</label>
</div>
<div class="item">
<input type="checkbox" id="32" name="classification[]" value="Uniformed Personnel">
<label for="AG-Wahl">Uniformed Personnel</label>
</div>
<div class="item">
<input type="checkbox" id="33" name="classification[]" value="Urban and Rural Poor">
<label for="AG-Wahl">Urban and Rural Poor</label>
</div>
<div class="item">
<input type="checkbox" id="34" name="classification[]" value="">
<label for="34">Person With Disabilities</label>
</div>

<button type="submit" class="submit">Submit</button>

    </form>

    <footer class="footer">
      <h3 class="republic">REPUBLIC OF THE PHILIPPINES</h3><br>
      <p class="content">All content is the public domain unless<br>otherwise stated</p>

      <h3 class="about">ABOUT GOVPH</h3><br>
      <p class="learn">Learn more about Philippine Goverment, its<br>structure, how government works and the<br>people behind it</p>
      <p class="gov">GOV.PH</p>
      <p class="gov">Open Data Patrol</p>
      <p class="gov">Official Gazettte</p>
    </footer>
    <script >
        $(document).ready(()=>{
            $(".txt, #muni, .checkbox").each(function() {
                $(this).change(function(){
                    var muni = $(this).val();
                    $('#selected_zip').val(getDist(muni));
                    $('#selected_zip').html(getDist(muni));
                    $('#Zip').val(getZip(muni));
                    $('#Zip').html(getZip(muni));
                });
            });
            $(".txt, #pmuni, .checkbox").each(function() {
                $(this).change(function(){
                    var muni = $(this).val();
                    $('#pselected_zip').val(getDist(muni));
                    $('#pselected_zip').html(getDist(muni));
                    $('#pZip').val(getZip(muni));
                    $('#pZip').html(getZip(muni));
                });
            });
        });

        function getZip(muni){
            var zip = {
                'Bago City': '6101',
                'Candoni': '6110',
                'Don Salvador Benedicto': '6133',
                'Escalante City': '6124'
            }
            return zip[`${muni}`];
        }

        function getDist(muni){
            var dist = {
                'Bago City': '4th',
                'Candoni': '6th',
                'Don Salvador Benedicto': '1st',
                'Escalante City': '1st'
            }
            return dist[`${muni}`];
        }

    </script>
</body>
</html>
