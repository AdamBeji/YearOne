import java.time.LocalTime;
import java.util.ArrayList;
import java.util.Iterator;


public class Functions{
	/** Declaration of the instance variables in this class */
	private double accountBalance;
    private ArrayList<CompanyInformation> CompanyList;

    public Functions(double Balance){
		CompanyList = new ArrayList<CompanyInformation>();
		this.accountBalance = Balance;
    }
	public Functions(){
		CompanyList = new ArrayList<CompanyInformation>();
		this.accountBalance = 100.0;
	}

	/** Method that returns the number of companies available to the user*/
    public int getNumberofCompanies(){
		return CompanyList.size();
    }

	/** This method os used to return the max number of stokes a user is allowed to sell from a particular company*/
	public int getNoOfStokes(String CompanyName){
		Iterator<CompanyInformation> iterator = CompanyList.iterator();
		int stocks = 0;
		while (iterator.hasNext()){
			CompanyInformation companyInformation = iterator.next();
			if (companyInformation.getCompany().equals(CompanyName)){
				stocks = companyInformation.getNoOfShares();
			}
		}
		return stocks;
	}
	/** Returns a string which contains all information about the stokes owned by the user from a particular company*/
    public String StockInformation(int CompanyName){
		LocalTime time = LocalTime.now();
		CompanyInformation companyInformation = CompanyList.get(CompanyName);
		Company stockInformation = new StockInformation(0.0);
		String text = "";
		text += "Name: " + companyInformation.getCompany() + "\n";
		text += ""+ companyInformation.printFunds() + "\n";
		text += "" + companyInformation.printNoOfShares() + "\n";
		text += "" + "\n";
		text+= "Stock price right now: " + time.getHour()+":"+time.getMinute()+":"+time.getSecond() + "\n";
		text+= " = "+ stockInformation.getRate() + "\n";
		return text;
    }

	/**Saves the current account balance automatically into a permanent file*/
	public boolean saveStatus(String name){
		FileHandling fileHandle = new FileHandling();
		boolean created = fileHandle.saveFile(name);
		boolean saved = fileHandle.saveContents(name,Math.round(accountBalance*100.0)/100.0);
		return created&&saved;
	}


	/** This method returns a string with the heading and the account balance*/
	public String accountBalance(){
		String text = "Your Portfolio" + "\n";
		text += "Total money left in account : "+ Math.round(accountBalance*100.0)/100.0 + "\n";
		return text;
	}

	/** Returns the second part of the users potfolio with all the stocks they own*/
	public String userPortfolio(){
		String text = "";
		Iterator<CompanyInformation> iterator = CompanyList.iterator();
		while (iterator.hasNext()){
			CompanyInformation companyInformation = iterator.next();
			if (companyInformation.getNoOfShares()>(0)){
				text += "Name: " + companyInformation.getCompany() + "\n";
				text += ""+ companyInformation.printFunds() + "\n";
				text += "" + companyInformation.printNoOfShares() + "\n";
			}
		}
		return text;
	}

	/** Returns all the company names in the array list*/
	public String getCompanyNames(){
		String text = "";
		Iterator<CompanyInformation> iterator = CompanyList.iterator();
		while (iterator.hasNext()){
			CompanyInformation companyInformation = iterator.next();
			text += companyInformation.getCompany() + "\n";
		}
		return text;
	}

	/** Method which adds a company onto the arraylist*/
    public void addCompany(CompanyInformation c){
		CompanyList.add(c);
    }


	/** A method which allows the user to buy shares which in turn changes different balances*/
	public boolean BuyShares(String clientName, int shares,double amount){
		boolean success = false;
		Iterator<CompanyInformation> iterator = CompanyList.iterator();
		for (int i=0;i<CompanyList.size();i++){
			CompanyInformation companyInformation = iterator.next();
			if (accountBalance>=(amount)) {
				if ((CompanyList.get(i)).getCompany().equals(clientName)) {
					companyInformation.deposit(amount);
					companyInformation.depositShares(shares);
					this.accountBalance -= amount;
					success = true;
				}
			}
			else{
				success = false;
			}
		}
		return success;
	}

	/** A method which allows the user to sell shares which in turn changes different balances*/
	public boolean SellShares(String clientName, int shares,double amount){
		boolean success = false;
		Iterator<CompanyInformation> iterator = CompanyList.iterator();
		while (iterator.hasNext()){
			CompanyInformation companyInformation = iterator.next();
			if (companyInformation.getCompany().equals(clientName)) {
				if (companyInformation.getNoOfShares()>=(shares)){
					companyInformation.withdraw(amount);
					this.accountBalance+=amount;
					companyInformation.sellShares(shares);
					if (companyInformation.getNoOfShares()==0){
						companyInformation.withdraw(companyInformation.getFunds());
					}
					success = true;
				}
				else{
					success = false;
				}
			}
		}
		return success;
	}


}