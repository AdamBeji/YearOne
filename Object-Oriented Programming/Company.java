public abstract class Company{
    private String name;
    private StockInformation stockInfo;
    private double Rate;

    public Company(String name){
        this.name = name;
    }
    public Company(double Rate){
        this.Rate = Rate;
    }

    public double getRate(){
        return this.Rate;
    }

    public String getCompany(){
        return this.name;
    }
    public String printFunds(){
        return String.valueOf(this.stockInfo.getBalance());
    }
    public String printNoOfShares(){
        return String.valueOf(this.stockInfo.getShares());
    }

}
