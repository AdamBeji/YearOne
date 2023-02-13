/* Adam Beji Investment App */
import javax.swing.*;
import java.awt.*;
import java.awt.event.*;


public class InvestmentApp extends Frame{
	/** Sets initial text of the info area to be "Investment Banking App" */
	private static TextArea infoArea = new TextArea("Here is £100, buy, sell and invest in companies to grow your income - Don't lose the money!");

	/** Function to allow text to be printed onto the info area */
	public static void print(String text){
		infoArea.setText(text);
	}

	/** Sets the instance variables of the objects Functions and Panel as private */
	private Functions function;
	private Panel stocksPanel;
	private FileHandling fileHandle;
	private StockInformation stockInformation;

	/** Method to print out all the available companies */
	public void printAllCompanies(){
		String text = function.getCompanyNames();
		print(text);
	}

	/** Method used to print out the users stake hold in a company and how much funds and shares they hold */
	public void printCompanyStockInfo(int index){
		String text = function.StockInformation(index);
		print(text);
	}
	/**
	 * Method which allows the user to add a company from the existing initial list
	 * The method creates a button which when pressed adds the company to the list as well as
	 * creating a new button which the user can use to see info about that company  */
	public void addCompany(String name) {
		function.addCompany(new CompanyInformation(name));
		int numOfCompanies = function.getNumberofCompanies();
		Button CompanyStockbtn = new Button("Share " + numOfCompanies);
		CompanyStockbtn.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt){
				String word = evt.getActionCommand();
				String[] parts = word.split("");
				int y = Integer.parseInt(parts[6]) - 1;
				printCompanyStockInfo(y);
			}
		});
		stocksPanel.add(CompanyStockbtn);
		this.setVisible(true);
	}

	/**
	 * Method which prints out the necessary info in the persons portfolio
	 */
	public void Portfolio(){
		String text1 = function.accountBalance();
		String text2 = function.userPortfolio();
		print(text1+text2);
	}


	/** Method which creates varies buttons to do different tasks */
	public InvestmentApp(){
		/** sets the background to be light grey */
		setBackground(Color.lightGray);
		this.function = new Functions();
		this.fileHandle = new FileHandling();
		this.stockInformation = new StockInformation(0.0);
		this.setLayout(new FlowLayout());

		Button PrintCompaniesbtn=new Button("Print All Companies");
		this.add(PrintCompaniesbtn);
		PrintCompaniesbtn.setBackground(Color.orange);
		PrintCompaniesbtn.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt) {
				printAllCompanies();
			}
		});

		Button savebtn=new Button("Offshore Money (Save)");
		savebtn.setBackground(Color.blue);
		savebtn.setForeground(Color.white);
		savebtn.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt) {
				Prompt acp = new Prompt();
				JOptionPane.showMessageDialog(null,"Your money will be sent to an offshore account");
				String UserInput = JOptionPane.showInputDialog(null,"Your account balance will be saved, Please enter your name");
				boolean status = function.saveStatus(UserInput);
				if (status==(true)&&UserInput!=(null)){
					print("Successfully transferred");
				}
				else{
					print("Unsuccessfull transfer, please contact your accountant");
				}
			}
		});
		this.add(savebtn);

		Button loadbtn=new Button("Travel (Load)");
		loadbtn.setBackground(Color.pink);
		loadbtn.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt) {
				Prompt acp = new Prompt();
				JOptionPane.showMessageDialog(null,"You will be travelling to a different country, unfortunately all current assets have been frozen so you cannot exchange them. However new companies await! Add them and trade with them! ");
				String UserInput = JOptionPane.showInputDialog(null,"Enter your name");
				String FileContents = fileHandle.loadContents(UserInput);
				if (FileContents == ("Error")|UserInput==(null)){
					print("Unsuccessfull transfer, please contact your accountant");
				}
				else{
					print("You can now start trading offshore! Remember to add new companies"+"\n"+"You have : £"+FileContents);
				}
				double ConvertFileContents = Double.parseDouble(FileContents);
				function = new Functions(ConvertFileContents);
			}
		});
		this.add(loadbtn);

		/**
		 * This method allows the user to enter a company they want to add.
		 */
		Button addCompanybtn=new Button("Add Company");
		addCompanybtn.setBackground(Color.cyan);
		addCompanybtn.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt) {
				Prompt acp = new Prompt();
				String UserInput = JOptionPane.showInputDialog(null,"Enter the Company you want to add").toUpperCase();
				if (!UserInput.equals("")){
					addCompany(UserInput);
				}
			}
		});
		this.add(addCompanybtn);

		/**
		 * This method allows the user to enter a company they want to buy stocks from
		 * and the necessary number of stocks from them
		 */
		Button depositButton = new Button("Buy Stock");
		depositButton.setBackground(Color.green);
		depositButton.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt) {
				Prompt acp = new Prompt();
				String UserInput = JOptionPane.showInputDialog(null,"Enter the stock you want to buy").toUpperCase();
				boolean found = false;
				for(int i = 0; i < function.getNumberofCompanies(); i++){
					String[] ArraySplit = function.getCompanyNames().split("\\R");
					String IndividualCompany = ArraySplit[i];
					if(IndividualCompany.equals(UserInput)){
						double randomRate = stockInformation.getRate();
						int UserOption = JOptionPane.showConfirmDialog(null, "Unit Price: " + randomRate + " Are you sure you want to buy?");
						if (UserOption==(0)){
							int UserShares = Integer.parseInt(JOptionPane.showInputDialog(null,"Enter number of stocks"));
							found = true;
							boolean success = function.BuyShares(UserInput,UserShares,randomRate*UserShares);
							if (success == (false)){
								found = false;
							}
							if (success==(true)){
								print("Transaction successfull");
							}
						}
					}
				}
				if (found == (false)){
					JOptionPane.showMessageDialog(null, "Error during this transaction");
				}
			}
		});
		this.add(depositButton);


		/**
		 * This method allows the user to enter a company they want to sell they're stocks
		 */
		Button withdrawButton = new Button("Sell Stock");
		this.add(withdrawButton);
		withdrawButton.setBackground(Color.red);
		withdrawButton.setForeground(Color.white);
		withdrawButton.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt) {
				Prompt acp = new Prompt();
				String UserInput = JOptionPane.showInputDialog(null,"Enter the stock you want to sell").toUpperCase();
				boolean found = false;
				for(int i = 0; i < function.getNumberofCompanies(); i++){
					String[] ArraySplit = function.getCompanyNames().split("\\R");
					String IndividualCompany = ArraySplit[i];
					if(IndividualCompany.equals(UserInput)){
						double randomRate = stockInformation.getRate();
						int UserOption = JOptionPane.showConfirmDialog(null, "Unit Price: "+randomRate+" Are you sure you want to sell?");
						if (UserOption==(0)){
							int UserShares = Integer.parseInt(JOptionPane.showInputDialog(null,"Enter number of stocks, Max = "+function.getNoOfStokes(UserInput)));
							found = true;
							boolean success = function.SellShares(UserInput,UserShares,randomRate*UserShares);
							if (success == (false)){
								found = false;
							}
							if (success == (true)){
								print("Transaction successfull");
							}
						}
					}
				}
				if (found == (false)){
					JOptionPane.showMessageDialog(null, "Error during this transaction");
				}
			}
		});

		/** THis method allows the user to access their potfolio when they press the button */
		Button printPortfolio=new Button("Portfolio");
		this.add(printPortfolio);
		printPortfolio.setBackground(Color.yellow);
		printPortfolio.addActionListener(new ActionListener(){
			public void actionPerformed(ActionEvent evt) {
				Portfolio();
			}
		});



		infoArea.setEditable(false);
		this.add(infoArea);


		stocksPanel = new Panel();
		stocksPanel.setLayout(new GridLayout(0,1));
		stocksPanel.setVisible(true);
		this.add(stocksPanel);


		this.addCompany("APPLE");
		this.addCompany("ALPHABET");
		this.addCompany("VISA");
		this.addCompany("MICROSOFT");

		WindowCloser wc = new WindowCloser();
		this.addWindowListener(wc);

		this.setSize(680,400);
		this.setLocationRelativeTo(null);
		this.setVisible(true);

	}

	public static void main(String[] args){
		new InvestmentApp();
	}
}

