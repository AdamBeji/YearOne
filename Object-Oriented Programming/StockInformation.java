import java.util.Random;

public class StockInformation extends Company{
    private double balance;
    private int Shares;
    
    public StockInformation(double Rate){
        super(Rate);
        this.balance=0.0;
        this.Shares=0;
    }

    public double getBalance(){
        return this.balance;
    }
    public int getShares(){
        return this.Shares;
    }

    public void deposit(double amount){
        this.balance += amount;
    }
    public void depositShares(int amount){
        this.Shares += amount;
    }
    public void sellShares(int amount){
        this.Shares -= amount;
    }

    public void withdraw(double amount){
        this.balance -= amount;
    }
    public double getRate(){
        Random randomNumber = new Random();
        return randomNumber.nextDouble()*2;
    }
    
}
