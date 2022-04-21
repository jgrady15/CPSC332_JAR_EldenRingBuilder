USE cs332s27;

CREATE TABLE POLICYHOLDER(
	CustomerID CHAR(7) NOT NULL,
	Name VARCHAR(50),
  Date_of_Birth DATE,
  Phone_Number INT NOT NULL,
  Address VARCHAR(80),
  Year_Of_Experience INT,
  PRIMARY KEY(CustomerID)
);

CREATE TABLE INS_COMPANY_NAME(
	CustSvc_PH INT NOT NULL,
	CEO_Name VARCHAR(50) NOT NULL,
	Hdquarter_address VARCHAR(80),
	Email_address VARCHAR(30),
	PRIMARY KEY(CustSvc_PH)
);

CREATE TABLE POLICIES(
	Policy_Number INT NOT NULL,
  CustomerID CHAR(7) NOT NULL,
  Policy_Type CHAR(4) NOT NULL,
	CustSvc_PH INT NOT NULL,
  Start_date DATE,
  End_date DATE,
  Total_Premium INT,
  PRIMARY KEY(Policy_Number),
  FOREIGN KEY (CustomerID) REFERENCES POLICYHOLDER(CustomerID)
	FOREIGN KEY (CustSvc_PH) REFERENCES INS_COMPANY_NAME(CustSvc_PH)
);

CREATE TABLE BALANCES(
	Policy_Number INT NOT NULL,
  Total_Premium INT,
  Last_Payment_Date DATE,
  Current_Balance_Remaining INT,
  PRIMARY KEY (Policy_Number),
  FOREIGN KEY (Policy_Number) REFERENCES POLICIES(Policy_Number)
);

CREATE TABLE DRIVING_ACTIVITY(
	CustomerID CHAR(7) NOT NULL,
  Violation_Type VARCHAR(30),
  Number_of_Points INT,
  Violation_Date DATE,
  PRIMARY KEY (CustomerID),
  FOREIGN KEY (CustomerID) REFERENCES POLICYHOLDER(CustomerID)
);

CREATE TABLE ADDITIONAL_DRIVERS(
	CustomerID CHAR(7) NOT NULL,
  Name VARCHAR(30),
  Date_of_Birth DATE,
  PRIMARY KEY (CustomerID),
  FOREIGN KEY (CustomerID) REFERENCES POLICYHOLDER(CustomerID)
);
