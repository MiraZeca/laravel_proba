@section('title')
    Exchange
@endsection

@extends('home')

@section('main')
  
<section class="ex">
    <div class="container1">
        <h1 class="color">Exchange rate table</h1>
        
        <div class="converter">
            <h2>Currency Converterr</h2>
            <form id="currency-converter-form">
                <label for="amount">Iznos:</label>
                <input type="number" id="amount" required placeholder="Unesite iznos">
    
                <label for="from-currency">From:</label>
                <select id="from-currency" required>
                    
                </select>
    
                <label for="to-currency">In:</label>
                <select id="to-currency" required>
                    
                </select>
    
                <button type="submit">Exchange</button>
            </form>
            <p id="conversion-result"></p>
        </div>
        
        <table id="exchange-rate-table">
            <thead>
                <tr>
                    <th>Currency</th>
                    <th>Sales rate</th>
                    <th>Buying rate</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>
</section>
<br><br>

<script src="{{ asset('js/exchange.js') }}"></script>
 
@endsection

<style>

.ex {
    background-color: #E8EDDF;
    padding: 20px 0;
}
.container1 {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    background-color: #333533;
    border-radius: 10px;
}

h1 {
    color: #F5CB5C !important; 
    margin-bottom: 30px;
}

h2 {
    color: #F5CB5C; 
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
}

th, td {
    padding: 10px;
    text-align: left;
    border: 1px solid #333533; 
    cursor: pointer;
}

th {
    background-color: #CFDBD5;
}

tr:nth-child(even) {
    background-color: #E8EDDF;
}

tr:hover {
    background-color: #F5CB5C; 
    color: #242423; 
}

td {
    background-color: #E8EDDF; 
}

.converter {
    margin-bottom: 40px;
    padding: 20px;
    background-color: #CFDBD5;
    border-radius: 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

label {
    margin-top: 10px;
    display: block;
}

input, select, button {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #333533; 
}

button {
    background-color: #F5CB5C;
    color: #242423; 
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #333533; 
    color: #E8EDDF; 
}

#conversion-result {
    margin-top: 20px;
    font-size: 1.2em;
    color: #F5CB5C; 
    background: #333533
}

tr:hover {
    background-color: #F5CB5C;
    color: #242423;
}

</style>
