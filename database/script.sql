USE [master]
GO
/****** Object:  Database [Neuromodulation]    Script Date: 10-07-2024 11:11:27 AM ******/
CREATE DATABASE [Neuromodulation]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'Neuromodulation', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\Neuromodulation.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'Neuromodulation_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.SQLEXPRESS\MSSQL\DATA\Neuromodulation_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [Neuromodulation] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [Neuromodulation].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [Neuromodulation] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [Neuromodulation] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [Neuromodulation] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [Neuromodulation] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [Neuromodulation] SET ARITHABORT OFF 
GO
ALTER DATABASE [Neuromodulation] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [Neuromodulation] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [Neuromodulation] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [Neuromodulation] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [Neuromodulation] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [Neuromodulation] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [Neuromodulation] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [Neuromodulation] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [Neuromodulation] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [Neuromodulation] SET  DISABLE_BROKER 
GO
ALTER DATABASE [Neuromodulation] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [Neuromodulation] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [Neuromodulation] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [Neuromodulation] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [Neuromodulation] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [Neuromodulation] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [Neuromodulation] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [Neuromodulation] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [Neuromodulation] SET  MULTI_USER 
GO
ALTER DATABASE [Neuromodulation] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [Neuromodulation] SET DB_CHAINING OFF 
GO
ALTER DATABASE [Neuromodulation] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [Neuromodulation] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [Neuromodulation] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [Neuromodulation] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [Neuromodulation] SET QUERY_STORE = ON
GO
ALTER DATABASE [Neuromodulation] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [Neuromodulation]
GO
/****** Object:  User [ragin]    Script Date: 10-07-2024 11:11:27 AM ******/
CREATE USER [ragin] FOR LOGIN [IIS APPPOOL\DefaultAppPool] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_owner] ADD MEMBER [ragin]
GO
ALTER ROLE [db_accessadmin] ADD MEMBER [ragin]
GO
ALTER ROLE [db_securityadmin] ADD MEMBER [ragin]
GO
ALTER ROLE [db_ddladmin] ADD MEMBER [ragin]
GO
ALTER ROLE [db_backupoperator] ADD MEMBER [ragin]
GO
ALTER ROLE [db_datareader] ADD MEMBER [ragin]
GO
ALTER ROLE [db_datawriter] ADD MEMBER [ragin]
GO
/****** Object:  Table [dbo].[Patient]    Script Date: 10-07-2024 11:11:27 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Patient](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[First_name] [varchar](255) NOT NULL,
	[Surname] [varchar](255) NOT NULL,
	[Date_of_birth] [date] NOT NULL,
	[Age] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Score]    Script Date: 10-07-2024 11:11:27 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Score](
	[Id] [int] IDENTITY(1,1) NOT NULL,
	[Question_1_score] [int] NOT NULL,
	[Question_2_score] [int] NOT NULL,
	[Question_3_score] [int] NOT NULL,
	[Question_4_score] [int] NOT NULL,
	[Question_5_score] [int] NOT NULL,
	[Question_6_score] [int] NOT NULL,
	[Question_7_score] [int] NOT NULL,
	[Question_8_score] [int] NOT NULL,
	[Question_9_score] [int] NOT NULL,
	[Question_10_score] [int] NOT NULL,
	[Question_11_score] [int] NOT NULL,
	[Question_12_score] [int] NOT NULL,
	[Total_score] [int] NOT NULL,
	[PatientId] [int] NOT NULL,
	[Created_date] [datetime2](7) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[Id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Score] ADD  DEFAULT (sysdatetime()) FOR [Created_date]
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD  CONSTRAINT [fk_score_patient] FOREIGN KEY([PatientId])
REFERENCES [dbo].[Patient] ([Id])
GO
ALTER TABLE [dbo].[Score] CHECK CONSTRAINT [fk_score_patient]
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_1_score]>=(0) AND [Question_1_score]<=(100)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_2_score]>=(0) AND [Question_2_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_3_score]>=(0) AND [Question_3_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_4_score]>=(0) AND [Question_4_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_5_score]>=(0) AND [Question_5_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_6_score]>=(0) AND [Question_6_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_7_score]>=(0) AND [Question_7_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_8_score]>=(0) AND [Question_8_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_9_score]>=(0) AND [Question_9_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_10_score]>=(0) AND [Question_10_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_11_score]>=(0) AND [Question_11_score]<=(10)))
GO
ALTER TABLE [dbo].[Score]  WITH CHECK ADD CHECK  (([Question_12_score]>=(0) AND [Question_12_score]<=(10)))
GO
/****** Object:  StoredProcedure [dbo].[spCreatePatientAndScore]    Script Date: 10-07-2024 11:11:27 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[spCreatePatientAndScore]
    @FirstName NVARCHAR(50),
    @Surname NVARCHAR(50),
    @DateOfBirth DATE,
    @Age INT,
    @Question1Score INT,
    @Question2Score INT,
    @Question3Score INT,
    @Question4Score INT,
    @Question5Score INT,
    @Question6Score INT,
    @Question7Score INT,
    @Question8Score INT,
    @Question9Score INT,
    @Question10Score INT,
    @Question11Score INT,
    @Question12Score INT,
    @TotalScore INT,
    @CreatedDate DATETIME
AS
BEGIN
    BEGIN TRANSACTION;
    BEGIN TRY
        -- Insert into Patient table
        INSERT INTO Patient (First_name, Surname, Date_of_birth, Age)
        VALUES (@FirstName, @Surname, @DateOfBirth, @Age);

        -- Get the last inserted ID
        DECLARE @PatientId INT;
        SET @PatientId = SCOPE_IDENTITY();

        -- Insert into Score table
        INSERT INTO Score (Question_1_score, Question_2_score, Question_3_score, Question_4_score,
                           Question_5_score, Question_6_score, Question_7_score, Question_8_score,
                           Question_9_score, Question_10_score, Question_11_score, Question_12_score,
                           Total_score, PatientId, Created_date)
        VALUES (@Question1Score, @Question2Score, @Question3Score, @Question4Score,
                @Question5Score, @Question6Score, @Question7Score, @Question8Score,
                @Question9Score, @Question10Score, @Question11Score, @Question12Score,
                @TotalScore, @PatientId, @CreatedDate);

        COMMIT TRANSACTION;
    END TRY
    BEGIN CATCH
        ROLLBACK TRANSACTION;
        THROW;
    END CATCH
END;
GO
/****** Object:  StoredProcedure [dbo].[spDeletePatientAndScore]    Script Date: 10-07-2024 11:11:27 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[spDeletePatientAndScore]
    @PatientId INT
AS
BEGIN
    BEGIN TRANSACTION;
    BEGIN TRY
        -- Delete from Score table
        DELETE FROM Score
        WHERE PatientId = @PatientId;

        -- Delete from Patient table
        DELETE FROM Patient
        WHERE Id = @PatientId;

        COMMIT TRANSACTION;
    END TRY
    BEGIN CATCH
        ROLLBACK TRANSACTION;
        THROW;
    END CATCH
END;
GO
/****** Object:  StoredProcedure [dbo].[spGetAllPatientsAndScores]    Script Date: 10-07-2024 11:11:27 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[spGetAllPatientsAndScores]
AS
BEGIN
    SELECT 
	p.Id,
        p.First_name,
        p.Surname,
        p.Date_of_birth,
        p.Age,
        s.Total_score,
        s.Created_date
    FROM 
        Patient p
    INNER JOIN 
        Score s ON p.Id = s.PatientId;
END;
GO
/****** Object:  StoredProcedure [dbo].[spGetPatientAndScoreByPatientId]    Script Date: 10-07-2024 11:11:27 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[spGetPatientAndScoreByPatientId]
    @PatientId INT
AS
BEGIN
    SELECT 
        p.First_name,
        p.Surname,
        p.Date_of_birth,
        p.Age,
        s.Question_1_score,
        s.Question_2_score,
        s.Question_3_score,
        s.Question_4_score,
        s.Question_5_score,
        s.Question_6_score,
        s.Question_7_score,
        s.Question_8_score,
        s.Question_9_score,
        s.Question_10_score,
        s.Question_11_score,
        s.Question_12_score,
        s.Total_score,
        s.PatientId,
        s.Created_date
    FROM 
        Patient p
    INNER JOIN 
        Score s ON p.Id = s.PatientId
    WHERE 
        p.Id = @PatientId;
END;
GO
/****** Object:  StoredProcedure [dbo].[spUpdatePatientAndScore]    Script Date: 10-07-2024 11:11:27 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[spUpdatePatientAndScore]
    @PatientId INT,
    @First_name NVARCHAR(50),
    @Surname NVARCHAR(50),
    @Date_of_birth DATE,
    @Age INT,
    @Question1Score INT,
    @Question2Score INT,
    @Question3Score INT,
    @Question4Score INT,
    @Question5Score INT,
    @Question6Score INT,
    @Question7Score INT,
    @Question8Score INT,
    @Question9Score INT,
    @Question10Score INT,
    @Question11Score INT,
    @Question12Score INT,
    @TotalScore INT,
    @CreatedDate DATETIME
AS
BEGIN
    BEGIN TRANSACTION;
    BEGIN TRY
        -- Update Patient table
        UPDATE Patient
        SET First_name = @First_name,
            Surname = @Surname,
            Date_of_birth = @Date_of_birth,
            Age = @Age
        WHERE Id = @PatientId;

        -- Update Score table
        UPDATE Score
        SET Question_1_score = @Question1Score,
            Question_2_score = @Question2Score,
            Question_3_score = @Question3Score,
            Question_4_score = @Question4Score,
            Question_5_score = @Question5Score,
            Question_6_score = @Question6Score,
            Question_7_score = @Question7Score,
            Question_8_score = @Question8Score,
            Question_9_score = @Question9Score,
            Question_10_score = @Question10Score,
            Question_11_score = @Question11Score,
            Question_12_score = @Question12Score,
            Total_score = @TotalScore,
            Created_date = @CreatedDate
        WHERE PatientId = @PatientId;

        COMMIT TRANSACTION;
    END TRY
    BEGIN CATCH
        ROLLBACK TRANSACTION;
        THROW;
    END CATCH
END;
GO
USE [master]
GO
ALTER DATABASE [Neuromodulation] SET  READ_WRITE 
GO
