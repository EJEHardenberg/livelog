// import org.apache.commons.*;
import java.net.*;
import java.io.*;



public class LiveLog{
  public String filename;
  public LiveLog(String filename){
    this.filename = filename;
  }
  
  public void postToServer(String data){
    String urlParameters = "data="+data;
    String request = "http://localhost/LiveLogCatch.php";
    try{
      URL url = new URL(request); 
      URLConnection connection = url.openConnection();
      System.out.println("Connections established");
      connection.setDoOutput(true);
//       connection.setDoInput(true);
//       connection.setInstanceFollowRedirects(false); 
//       connection.setRequestMethod("POST"); 
//       connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded"); 
//       connection.setRequestProperty("charset", "utf-8");
//       connection.setRequestProperty("Content-Length", "" + Integer.toString(urlParameters.getBytes().length));
//       connection.setUseCaches (false);

      OutputStreamWriter wr = new OutputStreamWriter(connection.getOutputStream());
      wr.write("data=12345");
      wr.flush();
      wr.close();
//       connection.disconnect();
      }catch (IOException e) {
	System.out.println("Caught IOException: " + e.getMessage());
      }
  }
  
//   public static void main(String args[]){
//   }
}