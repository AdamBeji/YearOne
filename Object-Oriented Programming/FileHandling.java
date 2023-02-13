import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;
import java.util.Scanner;

public class FileHandling extends Functions {
    private Functions functions;

    public FileHandling() {
        this.functions = new Functions();
    }

    /** Creates a new permanent file which has the name the user has inputted */
    public boolean saveFile(String Username) {
        boolean FileCcreated;
        try {
            File UserFile = new File(Username + ".txt");
            UserFile.createNewFile();
            FileCcreated = true;
        } catch (Exception e) {
            FileCcreated = false;
        }

        return FileCcreated;
    }

    /** Opens the newly created file and saves/inputs the users account balance into it */
    public boolean saveContents(String Username, double accountBalance) {
        boolean ContentsSaved;
        try {
            PrintWriter UserFile = new PrintWriter(new FileWriter(Username + ".txt"));
            UserFile.println(accountBalance);
            ContentsSaved = true;
            UserFile.close();
        } catch (Exception e) {
            ContentsSaved = false;
        }
        return ContentsSaved;
    }

    /** Loads the required contents from the right file*/
    public String loadContents(String UserName) {
        String FileContents = "";
        try {
            File UserFile = new File(UserName + ".txt");
            Scanner myReader = new Scanner(UserFile);
            while (myReader.hasNextLine()) {
                FileContents = myReader.nextLine();
            }
            myReader.close();
        } catch (Exception e) {
            FileContents = "Error";
        }
        return FileContents;
    }
}