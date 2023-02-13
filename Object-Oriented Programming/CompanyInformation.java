public class CompanyInformation extends Company {

    private StockInformation stockInfo;

    public CompanyInformation(String name){
        super(name);
        this.stockInfo = new StockInformation(0.0);
    }

    public void deposit(double amount){
        this.stockInfo.deposit(amount);
    }

    public void depositShares(int amount){
        this.stockInfo.depositShares(amount);
    }

    public void sellShares(int amount){
        this.stockInfo.sellShares(amount);
    }
    public void withdraw(double amount){
        this.stockInfo.withdraw(amount);
    }

    public double getFunds(){
        return this.stockInfo.getBalance();
    }
    public int getNoOfShares(){
        return this.stockInfo.getShares();
    }
    public String printFunds(){
        return "Total price of shares when bought: "+ String.valueOf(Math.round(this.stockInfo.getBalance()*100.0)/100.0);
    }
    public String printNoOfShares(){
        return "Shares: "+String.valueOf(this.stockInfo.getShares());
    }
}
