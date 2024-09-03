import os
import warnings

warnings.filterwarnings('ignore')

from langchain_core.messages import HumanMessage
from langchain_openai import ChatOpenAI
from langchain.chains.summarize import load_summarize_chain
from langchain_community.document_loaders import WebBaseLoader

os.environ['OPENAI_API_KEY'] = 'sk-Iq6e7wmCc3hVBprKc0ZQiMgYva1BT8czNkChQvYJV5T3BlbkFJGvcqW773P0AyrHUJILEAtv9giDJqy3AcAWVmw91Q4A'

llm = ChatOpenAI(model="gpt-4o-mini")


prompt = "hola cuales son los colores primarios?"

res = llm.invoke(
    [
        HumanMessage(
            content=[
                {"type": "text", "text": prompt},
               
            ]
        )
    ]
)


print(res.content)